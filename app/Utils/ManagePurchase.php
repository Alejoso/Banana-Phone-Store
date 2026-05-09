<?php

namespace App\Utils;

use App\Models\Invoice;
use App\Models\InvoiceLine;
use App\Models\Phone;
use App\Models\SavingsAccount;
use Brick\Math\BigInteger;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManagePurchase
{
    public function createInvoiceLineData(array $cartProductData, Collection $phones): array
    {
        // Create every invoice line to be stored in a variable
        $invoiceLinesData = [];

        foreach ($phones as $phone) {

            $phoneQuantity = $cartProductData[$phone->getID()];

            $invoiceLinesData[] = [
                'unit_price' => $phone->getPrice(),
                'discount' => 0,
                'quantity' => $phoneQuantity,
                'reason' => 'None',
                'phone_id' => $phone->getID(),
            ];
        }

        return $invoiceLinesData;
    }

    private function validate(array $invoiceLinesData)
    {
        $validation = Validator::make(
            ['lines' => $invoiceLinesData],
            [
                'lines' => ['required', 'array', 'min:1'],
                'lines.*.phone_id' => ['required', 'integer', 'exists:phones,id'],
                'lines.*.quantity' => ['required', 'integer', 'min:1'],
                'lines.*.unit_price' => ['required', 'integer', 'min:0'],
                'lines.*.discount' => ['required', 'integer', 'min:0', 'max:1'],
                'lines.*.reason' => ['required'],
            ]);

        return $validation;
    }

    private function createInvoiceAndInvoiceLines(array $invoiceLinesData, Collection $phones)
    {
        $invoicesByOffice = [];
        // Iterate every invoice line
        foreach ($invoiceLinesData as $lineData) {

            $phone = $phones[$lineData['phone_id']];
            $officeId = $phone->getOffice()->getId();

            // Create an invoice only once by office
            if (! isset($invoicesByOffice[$officeId])) {

                $invoicesByOffice[$officeId] = Invoice::create([
                    'date' => now()->toDateTimeString(),
                    'user_id' => auth()->user()->getId(),
                    'office_id' => $officeId,
                ]);
                
            }

            // Create the respective invoice line
            InvoiceLine::create([
                'invoice_id' => $invoicesByOffice[$officeId]->getId(),
                'phone_id' => $lineData['phone_id'],
                'quantity' => $lineData['quantity'],
                'unit_price' => $lineData['unit_price'],
                'reason' => $lineData['reason'],
                'discount' => $lineData['discount'],
            ]);
        }
    }

    private function decreaseBalance(array $invoiceLinesData, int $savingsAccountId): void
    {
        $totalAmount = 0;
        foreach ($invoiceLinesData as $lineData) {
            if ($lineData['discount'] > 0) {
                $totalAmount += $lineData['unit_price'] * $lineData['quantity'] / $lineData['discount'];
            } else {
                $totalAmount += $lineData['unit_price'] * $lineData['quantity'];
            }
        }

        $savingsAccount = SavingsAccount::findOrFail($savingsAccountId);

        // Get the user and validate if the balance is enough
        if ($savingsAccount->getBalance()->isLessThan(BigInteger::of($totalAmount))) {
            throw new Exception('The user does not have enough balance.');
        }

        $savingsAccount->setBalance($savingsAccount->getBalance()->minus(BigInteger::of($totalAmount)));
        $savingsAccount->save();
    }

    // This function validates that there is enough stock for each phone
    public function validateInventory(array $invoiceLinesData, Collection $phones): void
    {
        foreach ($invoiceLinesData as $lineData) {
            $phone = $phones[$lineData['phone_id']];

            // Validate that there is enough stock
            if (($phone->getQuantity() - $lineData['quantity']) < 0) {
                throw new Exception('Not enough stock for '.$phone->getName());
            }
        }
    }

    // This function only decreases the quantity
    private function decreaseInventory(array $invoiceLinesData, Collection $phones): void
    {
        foreach ($invoiceLinesData as $lineData) {
            $phone = $phones[$lineData['phone_id']];

            $phone->setQuantity($phone->getQuantity() - $lineData['quantity']);
            $phone->save();
        }
    }

    public function managePurchase(Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data', []);

        if (empty($cartProductData)) {
            session()->flash('error', __('messages.errorEmptyCart'));

            return back();
        }

        $phoneIds = array_keys($cartProductData);
        $phones = Phone::whereIn('id', $phoneIds)->get()->keyBy('id');

        // Get the structure of an invoice line from session
        $invoiceLinesData = $this->createInvoiceLineData($cartProductData, $phones);

        // Validate each invoice line
        $validator = $this->validate($invoiceLinesData);

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());

            return back();
        }

        // Validate inventory stock
        $this->validateInventory($invoiceLinesData, $phones);

        // Validate and decrease balance
        $this->decreaseBalance($invoiceLinesData, $request->input('savingsAccount'));

        // Decrease the inventory
        $this->decreaseInventory($invoiceLinesData, $phones);

        // Create invoices on DB for each office related to the purchase, then relate the invoiceLines with the created invoice
        $this->createInvoiceAndInvoiceLines($invoiceLinesData, $phones);

        $request->session()->forget('cart_product_data');
        session()->flash('success', __('messages.successOnPurchase'));

        return back();
    }
}

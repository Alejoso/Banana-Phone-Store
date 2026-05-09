<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Phone;
use App\Utils\ManagePurchase;
use Exception;
use Tests\TestCase;

class PurchaseTest extends TestCase
{
    public function test_validate_inventory_throws_exception_when_stock_is_insufficient(): void
    {
        // ARRANGE
        $phone = new Phone();
        $phone->id = 1;
        $phone->setName('iPhone 15');
        $phone->setQuantity(2);

        $phones = new Collection([1 => $phone]);

        $invoiceLinesData = [
            ['phone_id' => 1, 'quantity' => 5, 'unit_price' => 1000, 'discount' => 0, 'reason' => 'None'],
        ];

        $manager = new ManagePurchase();

        // ASSERT - Expectation
        $this->expectException(Exception::class); // We expect an exeption
        $this->expectExceptionMessage('Not enough stock for iPhone 15'); // We need the mesage to be exactly this one

        // ACT
        $manager->validateInventory($invoiceLinesData, $phones);
    }
    public function test_returns_one_line_per_phone(): void
    {
        // ARRANGE
        $phone1 = $this->createMock(Phone::class);
        $phone1->method('getID')->willReturn(1);
        $phone1->method('getPrice')->willReturn(1000);

        $phone2 = $this->createMock(Phone::class);
        $phone2->method('getID')->willReturn(2);
        $phone2->method('getPrice')->willReturn(2000);

        $phones = new Collection([1 => $phone1, 2 => $phone2]);

        $cartProductData = [
            1 => 3,  // 3 units of phone 1
            2 => 5,  // 5 units of phone 2
        ];

        // ACT
        $result = (new ManagePurchase())->createInvoiceLineData($cartProductData, $phones);

        // Verify that the method return exactly one line per phone (2 lines)
        $this->assertCount(2, $result);
    }

    public function test_each_line_contains_correct_phone_data(): void
    {
        // ARRANGE
        $phone = $this->createMock(Phone::class);
        $phone->method('getID')->willReturn(42);
        $phone->method('getPrice')->willReturn(1500);

        $phones = new Collection([42 => $phone]);
        $cartProductData = [42 => 7]; 

        // ACT
        $result = (new ManagePurchase())->createInvoiceLineData($cartProductData, $phones);

        // ASSERT
        $this->assertEquals(42, $result[0]['phone_id']);
        $this->assertEquals(1500, $result[0]['unit_price']);
        $this->assertEquals(7, $result[0]['quantity']);
        $this->assertEquals(0, $result[0]['discount']);
        $this->assertEquals('None', $result[0]['reason']);
    }
}

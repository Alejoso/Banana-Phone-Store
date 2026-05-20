<?php

namespace App\Utils;

use Illuminate\Support\Facades\Http;

class FetchExchangeRates
{
    public function fetchExchangeRates(): array
    {
        $targetCurrencies = ['USD', 'EUR', 'GBP'];
        $filteredRates = [];

        $response = Http::timeout(5)->get('https://open.er-api.com/v6/latest/COP');

        if ($response->successful() && $response->json('result') === 'success') {
            $allRates = $response->json('rates');

            foreach ($targetCurrencies as $currency) {
                if (isset($allRates[$currency])) {
                    $filteredRates[$currency] = $allRates[$currency];
                }
            }
        }

        return $filteredRates;
    }
}
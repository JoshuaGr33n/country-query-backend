<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class CountryRepository implements CountryRepositoryInterface
{
    public function getCountryData(string $code): array
    {
        return Http::get("https://api.worldbank.org/v2/country/{$code}?format=json")->json();
    }
}

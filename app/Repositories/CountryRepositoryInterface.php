<?php

namespace App\Repositories;

interface CountryRepositoryInterface
{
    public function getCountryData(string $code): array;
}

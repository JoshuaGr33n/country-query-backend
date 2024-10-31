<?php

namespace App\Services;

use App\Repositories\CountryRepositoryInterface;

class CountryService
{
    protected $countryRepository;

    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function getCountryByCode(string $code): array
    {
        $countryData = $this->countryRepository->getCountryData($code);

        // Check if a valid response was received from the API
        if (!isset($countryData[1]) || empty($countryData[1])) {
            return [
                'success' => false,
                'message' => 'Country not found. Please check the ISO code.',
            ];
        }

        $data = $countryData[1][0];

        return [
            'success' => true,
            'data' => [
                'name' => $data['name'],
                'region' => $data['region']['value'],
                'capitalCity' => $data['capitalCity'],
                'longitude' => $data['longitude'],
                'latitude' => $data['latitude'],
            ],
        ];
    }
}

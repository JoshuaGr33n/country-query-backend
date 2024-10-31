<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use App\Http\Requests\CountryRequest;

class CountryController extends Controller
{
    protected $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function getCountryByCode(CountryRequest $request)
    {
        // Extract the validated code from the request
        $code = $request->input('code');
        
        $result = $this->countryService->getCountryByCode($code);

        if ($result['success']) {
            return response()->json($result['data']);
        } else {
            return response()->json(['error' => $result['message']], 404);
        }
    }
}

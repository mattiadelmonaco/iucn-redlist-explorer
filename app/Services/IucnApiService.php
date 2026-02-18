<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class IucnApiService
{
    private string $baseUrl = 'https://api.iucnredlist.org/api/v4';
    private string $apiKey; // token autenticazione API IUCN

    public function __construct()
    {
        $this->apiKey = config('services.iucn.key');
    }

    /**
     * recupera lista dei sistemi (Terrestre, Acqua dolce, Marino)
     */
    public function getSystems(): array
    {
        $response = Http::withToken($this->apiKey)
            ->get("{$this->baseUrl}/systems/");

        return $response->json();
    }

    /**
     * recupera lista nazioni
     */
    public function getCountries(): array
    {
        $response = Http::withToken($this->apiKey)
            ->get("{$this->baseUrl}/country/list");

        return $response->json();
    }
}

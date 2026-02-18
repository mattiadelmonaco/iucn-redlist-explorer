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

        $data = $response->json();

        return $data['systems'] ?? [];
    }

    /**
     * recupera lista nazioni
     */
    public function getCountries(): array
    {
        $response = Http::withToken($this->apiKey)
            ->get("{$this->baseUrl}/countries/");

        $data = $response->json();

        return $data['countries'] ?? [];
    }

    /**
     * recupera lista valutazioni per un sistema specifico
     */
    public function getAssessmentsBySystem(string $code, int $page = 1): array
    {
        $response = Http::withToken($this->apiKey)
            ->get("{$this->baseUrl}/systems/{$code}", [
                'page' => $page
            ]);

        $data = $response->json();

        return [

            'system' => $data['system'] ?? null,
            'assessments' => $data['assessments'] ?? []

        ];
    }
}

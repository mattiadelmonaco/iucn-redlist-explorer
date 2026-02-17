<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class IucnApiService
{
    private string $baseUrl = 'https://api.iucnredlist.org/api/v4';
    private string $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.iucn.key');
    }
}

<?php

namespace App\Traits;

use App\Services\IucnApiService;

trait FooterData
{
    protected function getFooterData(IucnApiService $api): array
    {
        $apiVersion = $api->getApiVersion();
        $redListVersion = $api->getRedListVersion();
        $speciesCount = $api->getSpeciesCount();

        return [
            'apiVersion' => $apiVersion['api_version'] ?? 'N/A',
            'redListVersion' => $redListVersion['red_list_version'] ?? 'N/A',
            'speciesCount' => $speciesCount['count'] ?? 0
        ];
    }
}

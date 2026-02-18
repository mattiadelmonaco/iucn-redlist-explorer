<?php

namespace App\Helpers;

class CategoryHelper
{
    public static function translate(string $code): string
    {
        $categories = [
            'EX' => 'Estinto',
            'EW' => 'Estinto in natura',
            'CR' => 'In pericolo critico',
            'EN' => 'In pericolo',
            'VU' => 'Vulnerabile',
            'NT' => 'Quasi minacciato',
            'LC' => 'Rischio minimo',
            'DD' => 'Dati insufficienti',
            'NE' => 'Non valutato',
        ];

        return $categories[$code] ?? $code;
    }
}

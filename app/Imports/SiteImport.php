<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;

class SiteImport implements WithMultipleSheets, SkipsUnknownSheets
{
    /**
    * @param Collection $collection
    */
    public function sheets(): array
    {
        return [
            'ALL SITE' => new SiteSheetImport(),
        ];
    }
    
    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
}

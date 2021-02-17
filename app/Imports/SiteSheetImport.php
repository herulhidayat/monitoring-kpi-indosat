<?php

namespace App\Imports;

use App\Models\Site;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class SiteSheetImport implements ToModel, WithStartRow, WithUpserts, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Site([
        'site_id'       => $row[0],
        'site_name'     => $row[2],
        'micro_cluster' => $row[3],
        'coverage'      => $row[5],
        'status'        => $row[6],
        'outlet_surrounding'    => $row[7],
        'ono'           => $row[8],
        'total_outlet'  => $row[9],
        'uro'           => $row[23],
        'sso'           => $row[24],
        'quro'          => $row[26],
        'qsso'          => $row[27],
        'revenue'       => $row[39],
        'gap_revenue'   => $row[43],
        ]);
    }

    public function uniqueBy()
    {
        return 'site_id';
    }

    public function startRow(): int
    {
        return 4;
    }
}

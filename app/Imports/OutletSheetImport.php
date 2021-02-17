<?php

namespace App\Imports;

use App\Models\Outlet;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;


class OutletSheetImport implements ToModel, WithStartRow, WithUpserts, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Outlet([
        'outlet_id'     => $row[0],
        'username'      => $row[2],
        'outlet_name'   => $row[1],
        'micro_cluster' => $row[3],
        'category'      => $row[4],
        'balance'       => $row[7],
        'mobo_transaction'  => $row[12],
        'sultan_target' => $row[13],
        'sultan_ach'    => $row[14],
        'sultan_percen' => $row[15],
        'jawara_target' => $row[16],
        'jawara_ach'    => $row[17],
        'jawara_percen' => $row[18],
       
        ]);
    }

    public function uniqueBy()
    {
        return 'outlet_id';
    }

    public function startRow(): int
    {
        return 2;
    }
}

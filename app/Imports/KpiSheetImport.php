<?php

namespace App\Imports;

use App\Models\Kpi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class KpiSheetImport implements ToModel, WithStartRow, WithUpserts, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kpi([
        'username'      => $row[0],
        'nama'          => $row[1],
        'micro_cluster' => $row[2],
        'total_outlet'  => $row[4],
        'not_order'     => $row[5],
        'msa_target'    => $row[6],
        'msa_ach'       => $row[7],
        'msa_gap'       => $row[8],
        'msa_percen'    => $row[9],
        'msa_nilai'     => $row[10],
        'omb_target'    => $row[12],
        'omb_ach'       => $row[13],
        'omb_gap'       => $row[14],
        'omb_percen'    => $row[15],
        'omb_nilai'     => $row[16],
        'qsso_target'   => $row[18],
        'qsso_ach'      => $row[19],
        'qsso_gap'      => $row[20],
        'qsso_percen'   => $row[21],
        'qsso_nilai'    => $row[22],
        'quro_target'   => $row[23],
        'quro_ach'      => $row[24],
        'quro_gap'      => $row[25],
        'quro_percen'   => $row[26],
        'quro_nilai'    => $row[27],
        'sc_target'     => $row[28],
        'sc_ach'        => $row[33],
        'sc_gap'        => $row[34],
        'sc_percen'     => $row[37],
        'sc_nilai'      => $row[38],
        'ssohvc_target' => $row[39],
        'ssohvc_ach'    => $row[40],
        'ssohvc_gap'    => $row[41],
        'ssohvc_percen' => $row[42],
        'ssohvc_nilai'  => $row[43],
        'sqsso_target'  => $row[44],
        'sqsso_ach'     => $row[45],
        'sqsso_gap'     => $row[46],
        'sqsso_percen'  => $row[47],
        'sqsso_nilai'   => $row[48],
        'ssc_target'    => $row[49],
        'ssc_ach'       => $row[50],
        'ssc_gap'       => $row[51],
        'ssc_percen'    => $row[52],
        'ssc_nilai'     => $row[53],
        'score'         => $row[54],

        ]);
    }

    public function uniqueBy()
    {
        return 'username';
    }

    public function startRow(): int
    {
        return 7;
    }
}

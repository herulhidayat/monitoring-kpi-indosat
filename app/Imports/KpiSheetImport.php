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
        'qsso_target'   => $row[17],
        'qsso_ach'      => $row[18],
        'qsso_gap'      => $row[19],
        'qsso_percen'   => $row[20],
        'qsso_nilai'    => $row[21],
        'quro_target'   => $row[22],
        'quro_ach'      => $row[23],
        'quro_gap'      => $row[24],
        'quro_percen'   => $row[25],
        'quro_nilai'    => $row[26],
        'sc_target'     => $row[27],
        'sc_ach'        => $row[28],
        'sc_gap'        => $row[29],
        'sc_percen'     => $row[30],
        'sc_nilai'      => $row[31],
        'ssohvc_target' => $row[32],
        'ssohvc_ach'    => $row[33],
        'ssohvc_gap'    => $row[34],
        'ssohvc_percen' => $row[35],
        'ssohvc_nilai'  => $row[36],
        'sqsso_target'  => $row[37],
        'sqsso_ach'     => $row[38],
        'sqsso_gap'     => $row[39],
        'sqsso_percen'  => $row[40],
        'sqsso_nilai'   => $row[41],
        'ssc_target'    => $row[42],
        'ssc_ach'       => $row[43],
        'ssc_gap'       => $row[44],
        'ssc_percen'    => $row[45],
        'ssc_nilai'     => $row[46],
        'score'         => $row[47],

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

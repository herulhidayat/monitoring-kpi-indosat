<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    use HasFactory;

    protected $table = 'kpi';
    protected $fillable = [
    	'username',
        'nama',
        'micro_cluster',
    	'total_outlet',
    	'not_order',
    	'msa_target',
    	'msa_ach',
    	'msa_gap',
    	'msa_percen',
    	'msa_nilai',
    	'omb_target',
    	'omb_ach',
    	'omb_gap',
    	'omb_percen',
    	'omb_nilai',
    	'qsso_target',
    	'qsso_ach',
    	'qsso_gap',
    	'qsso_percen',
    	'qsso_nilai',
    	'quro_target',
    	'quro_ach',
    	'quro_gap',
    	'quro_percen',
    	'quro_nilai',
    	'sc_target',
    	'sc_ach',
    	'sc_gap',
    	'sc_percen',
    	'sc_nilai',
    	'ssohvc_target',
    	'ssohvc_ach',
    	'ssohvc_gap',
    	'ssohvc_percen',
    	'ssohvc_nilai',
    	'sqsso_target',
    	'sqsso_ach',
    	'sqsso_gap',
    	'sqsso_percen',
    	'sqsso_nilai',
        'ssc_target',
        'ssc_ach',
        'ssc_gap',
        'ssc_percen',
        'ssc_nilai',
        'score',
    ];

    public $timestamps = false;
}

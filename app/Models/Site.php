<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $table = 'site';
    protected $fillable = [
    	'site_id',
    	'site_name',
    	'micro_cluster',
    	'coverage',
    	'status',
    	'outlet_surrounding',
    	'ono',
    	'total_outlet',
    	'uro',
    	'sso',
    	'quro',
    	'qsso',
    	'revenue',
    	'gap_revenue',
    ];

    public $timestamps = false;
}

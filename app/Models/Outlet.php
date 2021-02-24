<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $table = 'outlet';
    protected $fillable = [
    	'outlet_id',
        'username',
    	'outlet_name',
    	'micro_cluster',
    	'category',
    	'balance',
    	'mobo_transaction',
    	'sultan_target',
    	'sultan_ach',
    	'sultan_percen',
    	'jawara_target',
    	'jawara_ach',
    	'jawara_percen',
        'sellin_sp',
        'sellin_daily',
        'mobo_daily',
    ];

    public $timestamps = false;
}

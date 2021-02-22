<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rencana extends Model
{
    use HasFactory;
    protected $table = 'outlet';
    protected $fillable = [
    	'user_id',
        'cso_id',
    	'judul',
    	'isi',
    	'rencana_start',
    	'rencana_end',
    	'status',
    	'keterangan',
    ];

    public $timestamps = false;
}

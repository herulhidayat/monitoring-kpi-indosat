<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastUpload extends Model
{
    use HasFactory;
    protected $table = 'last_upload';
    protected $fillable = [
    	'kategori',
    	'waktu_upload',
    ];

    public $timestamps = false;
}

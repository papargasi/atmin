<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gmv extends Model
{
    use HasFactory;
    public $table = 'tbl_gmv';
    protected $fillable = ['id_gmv','tanggal', 'gmv'];
    protected $primaryKey = 'id_gmv';
    public $incrementing = true;
    protected $keyType = 'integer';
}

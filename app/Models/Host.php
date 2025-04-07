<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    use HasFactory;
    
    public $table = 'tbl_host';
    protected $fillable = ['id_host','foto','nm_host', 'nm_panggilan', 'alamat', 'nohp', 'bank', 'norek', 'status'];
    protected $primaryKey = 'id_host';
    public $incrementing = true;
    protected $keyType = 'integer';
    public function absens()
    {
        return $this->hasMany(Absen::class, 'id_host','id_host');
    }
}

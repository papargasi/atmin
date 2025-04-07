<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    public $table = 'tbl_absen';
    protected $fillable = ['id_absen','id_host', 'tanggal','status','durasi'];
    protected $primaryKey = 'id_absen';
    public $incrementing = true;
    protected $keyType = 'integer';
    public function host()
    {
        return $this->belongsTo(Host::class,'id_host', 'id_host');
    }
}

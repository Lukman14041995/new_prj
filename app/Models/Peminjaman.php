<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjamen';
    protected $primaryKey = 'id';
    // protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'tanggal_pinjam','tanggal_kembali','tarif','total', 'mobil_id'];

    public function hasMobil()
    {
        return $this->belongsTo(MasterMobil::class, 'mobil_id', 'id');
    }
    public function hasUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterMobil extends Model
{
    use HasFactory;
    protected $table = 'master_mobils';
    protected $primaryKey = 'id';
    // protected $dates = ['deleted_at'];

    protected $fillable = ['merk', 'model', 'nopol', 'tarif','status'];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'mobil_id', 'id');
    }
}
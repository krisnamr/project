<?php

namespace App\Mongodb;

use Jenssegers\Mongodb\Eloquent\Model;

class Honor extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'honor';

    protected $fillable = [
        'honor_id',
        'honor',
        'pajak',
        'total',
        'nama_kegiatan',
        'jabatan',
    ];

    protected $guard = [
        'id',
    ];

    public function riwayat()
    {
        return $this->belongsTo(\App\Mongodb\Riwayat::class);
    }

   
}

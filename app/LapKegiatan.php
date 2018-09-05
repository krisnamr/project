<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LapKegiatan extends Model
{
    protected $table = 'lap_kegiatan';
    public $incrementing = false;

    protected $guarded = [];

    public function list_jabatan() {
      return $this->hasOne('App\ListJabatan', 'id', 'list_jabatan_id');
    }
    public function kegiatan() {
      return $this->belongsTo('App\kegiatan', 'id', 'id');
    }
}

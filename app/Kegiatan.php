<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    public $fillable=['nama_kegiatan','tgl_pelaksanaan','tempat','statuslaporan'];


      public function getNamaKegiatanAttribute($nama_kegiatan){
          return ucwords($nama_kegiatan);
      }

      public function getTempatAttribute($tempat){
        return ucwords($tempat);
    }

    public function setDateAttribute($value)
    {
    $this->attributes['tgl_pelaksanaan'] = Carbon\Carbon::createFromFormat('d-m-Y', $value);
    }

    public function list_jabatan(){
        return $this->hasOne('App\ListJabatan','id','kegiatan_id');
    }
    
    public function laporanHonor(){
        return $this->hasOne('App\LaporanHonor','id','kegiatan_id');
    }


    

    // protected $dates = ['tgl_pelaksanaan'];

}

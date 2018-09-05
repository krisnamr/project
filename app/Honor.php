<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Honor extends Model
{
    protected $table = 'honor';
    public $fillable=['users_id','honor','pajak','total','list_jabatan_id','lap_honor_id'];

  

    public function pembuat()
    {
        return $this->hasOne('App\UserHonor','id','users_honor_id');
    }

    public function list_jabatan() {
        return $this->belongsTo('App\ListJabatan','list_jabatan_id');
      }
   
      public function lap_honor(){
          return $this->belongsTo('App\LaporanHonor','lap_honor_id');
      }
}

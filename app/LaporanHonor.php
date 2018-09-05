<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanHonor extends Model
{
    protected $table = 'lap_honor';
    public $fillable=['kegiatan_id','statushonor','users_honor_id'];

    public function honors()
    {
        return $this->hasMany(\App\Honor::class, 'lap_honor_id');
    }

    public function kegiatan(){
        return $this->belongsTo('App\Kegiatan','kegiatan_id');
    }


    public function pembuat()
    {
        return $this->belongsTo('App\UserHonor','pembuat_id');
    }


}

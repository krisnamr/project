<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    public $fillable = ['nama_jabatan'];

    public function list_jabatan(){
        return $this->hasOne('App\Jabatan','id','jabatan_id');
    }

    public function getNamaJabatanAttribute($nama_jabatan){
        return ucwords($nama_jabatan);
    }

}

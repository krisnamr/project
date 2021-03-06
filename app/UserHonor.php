<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserHonor extends Authenticatable
{
    use Notifiable;
    protected $guard='honor';
    protected $fillable = ['fullname', 'email', 'password','jabatan','role',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lap_honor(){
        return $this->hasMany('App\LaporanHonor','id','pembuat');
    }

    public function lap_honor_akhir(){
        return $this->hasMany('App\LaporanHonor','id','pembuat_akhir');
    }
}

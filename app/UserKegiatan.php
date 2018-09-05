<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserKegiatan extends Authenticatable
{
    use Notifiable;
    protected $guard='kegiatan';
    
    protected $fillable = ['fullname', 'email', 'password','jabatan','role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

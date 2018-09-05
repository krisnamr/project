<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserPembukuan extends Authenticatable
{
    use Notifiable;
    protected $table = 'user_pembukuan';
    protected $guard='pembukuan';
    protected $fillable = ['fullname', 'email', 'password','jabatan','role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard='admin';
    protected $fillable = ['fullname', 'email', 'password','jabatan'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

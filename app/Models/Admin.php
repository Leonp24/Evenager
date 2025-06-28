<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // YANG INI PENTING
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable // BUKAN Model biasa
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

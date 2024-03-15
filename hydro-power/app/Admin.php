<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $table= 'admins';
    protected $fillable=[

        'user_name',
        'password',
    ];
}

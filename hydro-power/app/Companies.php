<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{

    protected $table= 'companies';
    protected $fillable=[

        'company_name',
        'icon',
    ];
 



}

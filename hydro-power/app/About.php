<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table= 'abouts';
    protected $fillable=[

      'introduction',
'photo',
'video_url',
'count_hydropower',
'count_runproject',
'count_company',
'count_intfinancier',
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';

    protected $fillable = array('name', 'featured_image');

    public function photos()
    {
        return $this->hasMany('App\Image', 'gallery_id');
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $upload = '/images/';

    protected $fillable = ['filename'];

    public function getFilenameAttribute($value){

        return $this->upload . $value;
    }

}

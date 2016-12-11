<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    public function Categories(){

        return $this->belongsTo(Categories::class);
    }
}
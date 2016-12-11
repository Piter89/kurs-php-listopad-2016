<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public function category(){

        return $this->belongsTo(CategoriesSites::class);
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['code', 'title', 'credit'];

    public function programs() {
        return $this->belongsToMany('App\Program')->withTimestamps();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['code', 'title', 'credit'];

    public function departments() {
        return $this->belongsToMany('App\Department')->withTimestamps();
    }
}

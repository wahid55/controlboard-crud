<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['name'];

    public function department() {
        return $this->belongsTo('App\Department');
    }

    public function courses() {
        return $this->belongsToMany('App\Course')->withTimestamps();
    }

    public function students() {
        return $this->hasMany('App\Student');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'established_at'];

    public function programs() {
        return $this->hasMany('App\Program');
    }

    public function faculties() {
        return $this->hasMany('App\Faculty');
    }
}

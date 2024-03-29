<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['teacher_name'];

    public function classRoom()
    {
        return $this->hasMany('App\ClassRoom');
    }
}

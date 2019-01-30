<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name','last_name','gender','join_year','class_room_id'];

    public function classRoom()
    {
        return $this->belongsTo('App\ClassRoom', 'class_room_id', 'id');
    }
}

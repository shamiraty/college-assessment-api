<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function instructors()
    {
        return $this->hasMany(Instructor::class);
    }

     public function students()
    {
        return $this->hasMany(Student::class);
    }

    
}
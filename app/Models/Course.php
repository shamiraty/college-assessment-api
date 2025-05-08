<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'program_id','code'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function instructors()
    {
        return $this->hasMany(Instructor::class);
    }

     public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function courseEvaluations()
    {
        return $this->hasMany(CourseEvaluation::class);
    }
}

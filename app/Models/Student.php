<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'registration_number',  //NI KAMA STUDENT ID
        'token',
        'academic_year_id',
        'semester',
        'program_id',
        'course_id',
        'department_id'
    ];

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function courseEvaluations()
    {
        return $this->hasMany(CourseEvaluation::class);
    }
}
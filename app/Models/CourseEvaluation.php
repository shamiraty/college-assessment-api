<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseEvaluation extends Model
{
    protected $fillable = [
        'student_id',
        'token_number',
        'course_id',
        'teaching_modality',
        'learning_materials',
        'lecture_time_start',
        'lecture_time_end',
        'lecturer_punctuality',
        'content_understanding',
        'student_engagement',
        'use_of_technology',
        'assessment_feedback',
        'course_relevance',
        'overall_satisfaction',
        'suggestions'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

     public function course()
    {
        return $this->belongsTo(Course::class);
    }
}


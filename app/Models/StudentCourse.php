<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;

    protected $table = 'student_courses'; // Eloquent itajaribu kubahatisha jina la table, lakini ni bora kuliweka wazi

    protected $fillable = ['student_id', 'course_id']; // Ruhusu hizi columns kujazwa kwa wingi
}
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCourseEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->string('token_number');
            $table->foreignId('course_id')->constrained('courses');
            $table->enum('teaching_modality', ['Good', 'Better', 'Best']);
            $table->enum('learning_materials', ['Available', 'Not Available', 'Complex to Understand']);
            $table->enum('lecture_time_start', ['Early Start', 'Coming Late']);
            $table->enum('lecture_time_end', ['Early End', 'Ending Late']);
            $table->enum('lecturer_punctuality', ['Always On Time', 'Sometimes Late', 'Always Late']);
            $table->enum('content_understanding', ['Very Clear', 'Average', 'Confusing']);
            $table->enum('student_engagement', ['Highly Interactive', 'Moderate', 'Not Interactive']);
            $table->enum('use_of_technology', ['Effective', 'Moderate', 'Not Used']);
            $table->enum('assessment_feedback', ['Timely & Helpful', 'Late Feedback', 'No Feedback']);
            $table->enum('course_relevance', ['Very Relevant', 'Somewhat Relevant', 'Not Relevant']);
            $table->enum('overall_satisfaction', ['Very Satisfied', 'Satisfied', 'Not Satisfied']);
            $table->text('suggestions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_evaluations');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\CourseEvaluation;
use App\Models\Student;
use App\Models\Course;
use App\Models\StudentCourse; // Add this import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
class CourseEvaluationController extends Controller
{
    public function storeApi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|exists:students,registration_number', // Change validation to registration_number
            'token_number' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'teaching_modality' => 'required|in:Good,Better,Best',
            'learning_materials' => 'required|in:Available,Not Available,Complex to Understand',
            'lecture_time_start' => 'required|in:Early Start,Coming Late',
            'lecture_time_end' => 'required|in:Early End,Ending Late',
            'lecturer_punctuality' => 'required|in:Always On Time,Sometimes Late,Always Late',
            'content_understanding' => 'required|in:Very Clear,Average,Confusing',
            'student_engagement' => 'required|in:Highly Interactive,Moderate,Not Interactive',
            'use_of_technology' => 'required|in:Effective,Moderate,Not Used',
            'assessment_feedback' => 'required|in:Timely & Helpful,Late Feedback,No Feedback',
            'course_relevance' => 'required|in:Very Relevant,Somewhat Relevant,Not Relevant',
            'overall_satisfaction' => 'required|in:Very Satisfied,Satisfied,Not Satisfied',
            'suggestions' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Find the student by registration number
        $student = Student::where('registration_number', $request->student_id)->first();
        if (!$student) {
            return response()->json(['error' => 'Invalid registration number.'], 404); // 404 Not Found
        }

        if ($student->token !== $request->token_number) {
            return response()->json(['error' => 'Invalid token number for the provided registration number.'], 401); // 401 Unauthorized
        }

        // 1. Block if the same student (by id) and course_id combination already exists
        $existingEvaluation = CourseEvaluation::where('student_id', $student->id) // Use the student's id
            ->where('course_id', $request->course_id)
            ->first();

        if ($existingEvaluation) {
            return response()->json(['error' => 'You have already submitted an evaluation for this course.'], 409); // 409 Conflict
        }

        // 2. Verify if the student is enrolled in the course being evaluated using student_course table
        $isEnrolled = StudentCourse::where('student_id', $student->id) // Use the student's id
            ->where('course_id', $request->course_id)
            ->exists();

        if (!$isEnrolled) {
            return response()->json(['error' => 'You are not enrolled in the course you are trying to evaluate.'], 400); // 400 Bad Request
        }

        try {
            // Create the CourseEvaluation with the student's id
            CourseEvaluation::create(array_merge($request->all(), ['student_id' => $student->id]));
            return response()->json(['message' => 'Course evaluation submitted successfully.'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to submit course evaluation: ' . $e->getMessage()], 500);
        }
    }








    public function index(): View
    {
        // 1. Basic Counts
        $totalEvaluations = CourseEvaluation::count();
        $totalStudents = Student::count();
        $totalCourses = Course::count();
    
        // 2. Course Evaluation Breakdown with Department and Program
        $courseEvaluationCounts = CourseEvaluation::select(
            'course_evaluations.course_id',
            DB::raw('count(*) as count'),
            'courses.name as course_name',
            'departments.name as department_name',
            'programs.name as program_name'
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->join('departments', 'programs.department_id', '=', 'departments.id')
            ->groupBy('course_evaluations.course_id', 'courses.name', 'departments.name', 'programs.name')
            ->orderByDesc('count')
            ->get();
    
        // 3. Modality Analysis
        $modalityCounts = CourseEvaluation::select('teaching_modality', DB::raw('count(*) as count'))
            ->groupBy('teaching_modality')
            ->get()
            ->pluck('count', 'teaching_modality')
            ->toArray();
    
        // 4. Learning Materials Analysis
        $materialCounts = CourseEvaluation::select('learning_materials', DB::raw('count(*) as count'))
            ->groupBy('learning_materials')
            ->get()
            ->pluck('count', 'learning_materials')
            ->toArray();
    
        // 5. Lecturer Punctuality
        $punctualityCounts = CourseEvaluation::select('lecturer_punctuality', DB::raw('count(*) as count'))
            ->groupBy('lecturer_punctuality')
            ->get()
            ->pluck('count', 'lecturer_punctuality')
            ->toArray();
    
        // 6. Content Understanding
        $understandingCounts = CourseEvaluation::select('content_understanding', DB::raw('count(*) as count'))
            ->groupBy('content_understanding')
            ->get()
            ->pluck('count', 'content_understanding')
            ->toArray();
    
        // 7. Student Engagement
        $engagementCounts = CourseEvaluation::select('student_engagement', DB::raw('count(*) as count'))
            ->groupBy('student_engagement')
            ->get()
            ->pluck('count', 'student_engagement')
            ->toArray();
    
        // 8. Overall Satisfaction
        $satisfactionCounts = CourseEvaluation::select('overall_satisfaction', DB::raw('count(*) as count'))
            ->groupBy('overall_satisfaction')
            ->get()
            ->pluck('count', 'overall_satisfaction')
            ->toArray();
    
        // 9. Course Relevance
        $relevanceCounts = CourseEvaluation::select('course_relevance', DB::raw('count(*) as count'))
            ->groupBy('course_relevance')
            ->get()
            ->pluck('count', 'course_relevance')
            ->toArray();
    
        // 10. Use of Technology
        $technologyCounts = CourseEvaluation::select('use_of_technology', DB::raw('count(*) as count'))
            ->groupBy('use_of_technology')
            ->get()
            ->pluck('count', 'use_of_technology')
            ->toArray();
    
        // 11. Lecture Timing Analysis
        $lectureTimeStartCounts = CourseEvaluation::select('lecture_time_start', DB::raw('count(*) as count'))
            ->groupBy('lecture_time_start')
            ->get()->pluck('count', 'lecture_time_start')->toArray();
    
        $lectureTimeEndCounts = CourseEvaluation::select('lecture_time_end', DB::raw('count(*) as count'))
            ->groupBy('lecture_time_end')
            ->get()->pluck('count', 'lecture_time_end')->toArray();
    
        // 12. Assessment Feedback
        $assessmentFeedbackCounts = CourseEvaluation::select('assessment_feedback', DB::raw('count(*) as count'))
            ->groupBy('assessment_feedback')
            ->get()
            ->pluck('count', 'assessment_feedback')
            ->toArray();
    
        // Prepare course data for the chart.  Include department and program.
        $courseChartData = [];
        foreach ($courseEvaluationCounts as $course) {
            $courseChartData[] = [
                'course_name' => $course->course_name,
                'department_name' => $course->department_name,
                'program_name' => $course->program_name,
                'count' => $course->count,
            ];
        }
    
        // Prepare data for the crosstabs
        $crosstabData = [];
    
        $crosstabData['modality'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'teaching_modality',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'teaching_modality')
            ->orderBy('courses.name')
            ->get();
    
        $crosstabData['material'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'learning_materials',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'learning_materials')
            ->orderBy('courses.name')
            ->get();
    
        $crosstabData['punctuality'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'lecturer_punctuality',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'lecturer_punctuality')
            ->orderBy('courses.name')
            ->get();
    
        $crosstabData['understanding'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'content_understanding',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'content_understanding')
            ->orderBy('courses.name')
            ->get();
    
        $crosstabData['engagement'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'student_engagement',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'student_engagement')
            ->orderBy('courses.name')
            ->get();
    
        $crosstabData['satisfaction'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'overall_satisfaction',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'overall_satisfaction')
            ->orderBy('courses.name')
            ->get();
    
        $crosstabData['relevance'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'course_relevance',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'course_relevance')
            ->orderBy('courses.name')
            ->get();
    
        $crosstabData['technology'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'use_of_technology',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'use_of_technology')
            ->orderBy('courses.name')
            ->get();
    
        $crosstabData['lectureTimeStart'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'lecture_time_start',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'lecture_time_start')
            ->orderBy('courses.name')
            ->get();
    
        $crosstabData['lectureTimeEnd'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'lecture_time_end',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'lecture_time_end')
            ->orderBy('courses.name')
            ->get();
    
        $crosstabData['assessmentFeedback'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'assessment_feedback',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'assessment_feedback')
            ->orderBy('courses.name')
            ->get();
    
    
        // Pass the data to the view
        return view('course_evaluations.index', [
            'totalEvaluations' => $totalEvaluations,
            'totalStudents' => $totalStudents,
            'totalCourses' => $totalCourses,
            'courseEvaluationCounts' => $courseEvaluationCounts,
            'modalityCounts' => $modalityCounts,
            'materialCounts' => $materialCounts,
            'punctualityCounts' => $punctualityCounts,
            'understandingCounts' => $understandingCounts,
            'engagementCounts' => $engagementCounts,
            'satisfactionCounts' => $satisfactionCounts,
            'relevanceCounts' => $relevanceCounts,
            'technologyCounts' => $technologyCounts,
            'lectureTimeStartCounts' => $lectureTimeStartCounts,
            'lectureTimeEndCounts' => $lectureTimeEndCounts,
            'assessmentFeedbackCounts' => $assessmentFeedbackCounts,
            'courseChartData' => $courseChartData, // Pass the prepared data for the course chart
            'crosstabData' => $crosstabData, // Pass the crosstab data to the view
        ]);
    }
    



    public function indexAPI(): JsonResponse
    {
        // 1. Basic Counts
        $totalEvaluations = CourseEvaluation::count();
        $totalStudents = Student::count();
        $totalCourses = Course::count();

        // 2. Course Evaluation Breakdown with Department and Program
        $courseEvaluationCounts = CourseEvaluation::select(
            'course_evaluations.course_id',
            DB::raw('count(*) as count'),
            'courses.name as course_name',
            'departments.name as department_name',
            'programs.name as program_name'
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->join('departments', 'programs.department_id', '=', 'departments.id')
            ->groupBy('course_evaluations.course_id', 'courses.name', 'departments.name', 'programs.name')
            ->orderByDesc('count')
            ->get();

        // 3. Modality Analysis
        $modalityCounts = CourseEvaluation::select('teaching_modality', DB::raw('count(*) as count'))
            ->groupBy('teaching_modality')
            ->get()
            ->pluck('count', 'teaching_modality')
            ->toArray();

        // 4. Learning Materials Analysis
        $materialCounts = CourseEvaluation::select('learning_materials', DB::raw('count(*) as count'))
            ->groupBy('learning_materials')
            ->get()
            ->pluck('count', 'learning_materials')
            ->toArray();

        // 5. Lecturer Punctuality
        $punctualityCounts = CourseEvaluation::select('lecturer_punctuality', DB::raw('count(*) as count'))
            ->groupBy('lecturer_punctuality')
            ->get()
            ->pluck('count', 'lecturer_punctuality')
            ->toArray();

        // 6. Content Understanding
        $understandingCounts = CourseEvaluation::select('content_understanding', DB::raw('count(*) as count'))
            ->groupBy('content_understanding')
            ->get()
            ->pluck('count', 'content_understanding')
            ->toArray();

        // 7. Student Engagement
        $engagementCounts = CourseEvaluation::select('student_engagement', DB::raw('count(*) as count'))
            ->groupBy('student_engagement')
            ->get()
            ->pluck('count', 'student_engagement')
            ->toArray();

        // 8. Overall Satisfaction
        $satisfactionCounts = CourseEvaluation::select('overall_satisfaction', DB::raw('count(*) as count'))
            ->groupBy('overall_satisfaction')
            ->get()
            ->pluck('count', 'overall_satisfaction')
            ->toArray();

        // 9. Course Relevance
        $relevanceCounts = CourseEvaluation::select('course_relevance', DB::raw('count(*) as count'))
            ->groupBy('course_relevance')
            ->get()
            ->pluck('count', 'course_relevance')
            ->toArray();

        // 10. Use of Technology
        $technologyCounts = CourseEvaluation::select('use_of_technology', DB::raw('count(*) as count'))
            ->groupBy('use_of_technology')
            ->get()
            ->pluck('count', 'use_of_technology')
            ->toArray();

        // 11. Lecture Timing Analysis
        $lectureTimeStartCounts = CourseEvaluation::select('lecture_time_start', DB::raw('count(*) as count'))
            ->groupBy('lecture_time_start')
            ->get()->pluck('count', 'lecture_time_start')->toArray();

        $lectureTimeEndCounts = CourseEvaluation::select('lecture_time_end', DB::raw('count(*) as count'))
            ->groupBy('lecture_time_end')
            ->get()->pluck('count', 'lecture_time_end')->toArray();

        // 12. Assessment Feedback
        $assessmentFeedbackCounts = CourseEvaluation::select('assessment_feedback', DB::raw('count(*) as count'))
            ->groupBy('assessment_feedback')
            ->get()
            ->pluck('count', 'assessment_feedback')
            ->toArray();

        // Prepare course data for the chart.  Include department and program.
        $courseChartData = [];
        foreach ($courseEvaluationCounts as $course) {
            $courseChartData[] = [
                'course_name' => $course->course_name,
                'department_name' => $course->department_name,
                'program_name' => $course->program_name,
                'count' => $course->count,
            ];
        }

        // Prepare data for the crosstabs
        $crosstabData = [];

        $crosstabData['modality'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'teaching_modality',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'teaching_modality')
            ->orderBy('courses.name')
            ->get();

        $crosstabData['material'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'learning_materials',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'learning_materials')
            ->orderBy('courses.name')
            ->get();

        $crosstabData['punctuality'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'lecturer_punctuality',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'lecturer_punctuality')
            ->orderBy('courses.name')
            ->get();

        $crosstabData['understanding'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'content_understanding',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'content_understanding')
            ->orderBy('courses.name')
            ->get();

        $crosstabData['engagement'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'student_engagement',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'student_engagement')
            ->orderBy('courses.name')
            ->get();

        $crosstabData['satisfaction'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'overall_satisfaction',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'overall_satisfaction')
            ->orderBy('courses.name')
            ->get();

        $crosstabData['relevance'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'course_relevance',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'course_relevance')
            ->orderBy('courses.name')
            ->get();

        $crosstabData['technology'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'use_of_technology',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'use_of_technology')
            ->orderBy('courses.name')
            ->get();

        $crosstabData['lectureTimeStart'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'lecture_time_start',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'lecture_time_start')
            ->orderBy('courses.name')
            ->get();

        $crosstabData['lectureTimeEnd'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'lecture_time_end',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'lecture_time_end')
            ->orderBy('courses.name')
            ->get();

        $crosstabData['assessmentFeedback'] = CourseEvaluation::select(
            'courses.name as course_name',
            'programs.name as program_name',
            'assessment_feedback',
            DB::raw('count(*) as frequency')
        )
            ->join('courses', 'course_evaluations.course_id', '=', 'courses.id')
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->groupBy('courses.name', 'programs.name', 'assessment_feedback')
            ->orderBy('courses.name')
            ->get();


        // Prepare the data to be sent as JSON
        $responseData = [
            'total_evaluations' => $totalEvaluations,
            'total_students' => $totalStudents,
            'total_courses' => $totalCourses,
            'course_evaluation_counts' => $courseEvaluationCounts,
            'modality_counts' => $modalityCounts,
            'material_counts' => $materialCounts,
            'punctuality_counts' => $punctualityCounts,
            'understanding_counts' => $understandingCounts,
            'engagement_counts' => $engagementCounts,
            'satisfaction_counts' => $satisfactionCounts,
            'relevance_counts' => $relevanceCounts,
            'technology_counts' => $technologyCounts,
            'lecture_time_start_counts' => $lectureTimeStartCounts,
            'lecture_time_end_counts' => $lectureTimeEndCounts,
            'assessment_feedback_counts' => $assessmentFeedbackCounts,
            'course_chart_data' => $courseChartData,
            'crosstab_data' => $crosstabData,
        ];

        return response()->json($responseData);
    }
    
}
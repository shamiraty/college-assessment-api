@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm border-0">
            <div class="row g-0 align-items-center">
                <div class="col-4 bg-primary text-white d-flex justify-content-center align-items-center" style="height: 100px;">
                    <i class="fas fa-check-circle fa-2x"></i>
                </div>
                <div class="col-8 text-center py-3">
                    <h6 class="mb-1">Total Evaluations</h6>
                    <h3 class="fw-bold text-primary mb-0">{{ $totalEvaluations }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card shadow-sm border-0">
            <div class="row g-0 align-items-center">
                <div class="col-4 bg-success text-white d-flex justify-content-center align-items-center" style="height: 100px;">
                    <i class="fas fa-user-graduate fa-2x"></i>
                </div>
                <div class="col-8 text-center py-3">
                    <h6 class="mb-1">Total Students</h6>
                    <h3 class="fw-bold text-success mb-0">{{ $totalStudents }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card shadow-sm border-0">
            <div class="row g-0 align-items-center">
                <div class="col-4 text-white d-flex justify-content-center align-items-center" style="background-color: #6f42c1; height: 100px;">
                    <i class="fas fa-book-open fa-2x"></i>
                </div>
                <div class="col-8 text-center py-3">
                    <h6 class="mb-1">Total Courses</h6>
                    <h3 class="fw-bold" style="color: #6f42c1;">{{ $totalCourses }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row mb-8">
    <div class="col-lg-6 mb-8">
        <div class="card shadow-lg">
            <div class="card-body">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Course Evaluation Breakdown</h2>
                <ul class="list-group">
                    @foreach ($courseEvaluationCounts as $course)
                        <li class="list-group-item p-0 border-0 mb-2">
                            <div class="row g-0 align-items-center shadow-sm rounded overflow-hidden">
                                <!-- Left shaded area (value) -->
                                <div class="col-3 bg-primary text-white d-flex justify-content-center align-items-center" style="height: 100px;">
                                    <span class="fw-bold fs-4">{{ $course->count }}</span>
                                </div>
                                <!-- Right area (course info) -->
                                <div class="col-9 bg-white p-3">
                                    <div class="text-start">
                                        <span class="fw-semibold text-dark">{{ $course->course_name }}</span><br>
                                        <small class="text-muted">Department: {{ $course->department_name }}</small><br>
                                        <small class="text-muted">Program: {{ $course->program_name }}</small>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
 


            <div class="col-lg-6 mb-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Overall Student Satisfaction</h2>
                        <div class="chart-container">
                            <canvas id="satisfactionChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-8 mt-2">
            <div class="col-lg-6 mb-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Teaching Modality</h2>
                        <div class="chart-container">
                            <canvas id="modalityChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-8 mt-2">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Learning Materials</h2>
                        <div class="chart-container">
                            <canvas id="materialsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-8 mt-2">
            <div class="col-lg-6 mb-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Lecturer Punctuality</h2>
                        <div class="chart-container">
                            <canvas id="punctualityChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-8 mt-2">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Content Understanding</h2>
                        <div class="chart-container">
                            <canvas id="understandingChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-8 mt-2">
            <div class="col-lg-6 mb-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Student Engagement</h2>
                        <div class="chart-container">
                            <canvas id="engagementChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-8 mt-2">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Use of Technology</h2>
                        <div class="chart-container">
                            <canvas id="technologyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-8 mt-2">
            <div class="col-lg-6 mb-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Course Relevance</h2>
                        <div class="chart-container">
                            <canvas id="relevanceChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-8 mt-2">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Assessment Feedback</h2>
                        <div class="chart-container">
                            <canvas id="assessmentFeedbackChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-8 mt-2">
            <div class="col-lg-6 mb-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Lecture Time Start</h2>
                        <div class="chart-container">
                            <canvas id="lectureTimeStartChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-8 mt-2">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Lecture Time End</h2>
                        <div class="chart-container">
                            <canvas id="lectureTimeEndChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-header">
                <h4>Crosstab Data</h4>
            </div>
            <div class="card-body">

            @if(isset($crosstabData['modality']) && count($crosstabData['modality']) > 0)
        <h5 class="mt-2">Teaching Modality by Course and Program</h5>
        <div class="table-responsive mt-2">
        <table class="table table-bordered table-striped table-hover mb-0" id="table">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Program</th>
                    <th>Teaching Modality</th>
                    <th>Frequency</th>
                </tr>
            </thead>
            <tbody>
                @foreach($crosstabData['modality'] as $item)
                    <tr>
                        <td>{{ $item->course_name }}</td>
                        <td>{{ $item->program_name }}</td>
                        <td>{{ $item->teaching_modality }}</td>
                        <td>{{ $item->frequency }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @endif

    @if(isset($crosstabData['material']) && count($crosstabData['material']) > 0)
        <h5 class="mt-2">Learning Materials by Course and Program</h5>
        <div class="table-responsive mt-2">
        <table class="table table-bordered table-striped table-hover mb-0" id="table">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Program</th>
                    <th>Learning Materials</th>
                    <th>Frequency</th>
                </tr>
            </thead>
            <tbody>
                @foreach($crosstabData['material'] as $item)
                    <tr>
                        <td>{{ $item->course_name }}</td>
                        <td>{{ $item->program_name }}</td>
                        <td>{{ $item->learning_materials }}</td>
                        <td>{{ $item->frequency }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @endif

    @if(isset($crosstabData['punctuality']) && count($crosstabData['punctuality']) > 0)
        <h5 class="mt-2">Lecturer Punctuality by Course and Program</h5>
        <div class="table-responsive mt-2">
            <table class="table table-bordered table-striped table-hover mb-0" id="table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Program</th>
                        <th>Lecturer Punctuality</th>
                        <th>Frequency</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crosstabData['punctuality'] as $item)
                        <tr>
                            <td>{{ $item->course_name }}</td>
                            <td>{{ $item->program_name }}</td>
                            <td>{{ $item->lecturer_punctuality }}</td>
                            <td>{{ $item->frequency }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if(isset($crosstabData['understanding']) && count($crosstabData['understanding']) > 0)
        <h5 class="mt-2">Content Understanding by Course and Program</h5>
        <div class="table-responsive mt-2">
        <table class="table table-bordered table-striped table-hover mb-0" id="table">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Program</th>
                    <th>Content Understanding</th>
                    <th>Frequency</th>
                </tr>
            </thead>
            <tbody>
                @foreach($crosstabData['understanding'] as $item)
                    <tr>
                        <td>{{ $item->course_name }}</td>
                        <td>{{ $item->program_name }}</td>
                        <td>{{ $item->content_understanding }}</td>
                        <td>{{ $item->frequency }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @endif

    @if(isset($crosstabData['engagement']) && count($crosstabData['engagement']) > 0)
        <h5 class="mt-2">Student Engagement by Course and Program</h5>
        <div class="table-responsive mt-2">
        <table class="table table-bordered table-striped table-hover mb-0" id="table">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Program</th>
                    <th>Student Engagement</th>
                    <th>Frequency</th>
                </tr>
            </thead>
            <tbody>
                @foreach($crosstabData['engagement'] as $item)
                    <tr>
                        <td>{{ $item->course_name }}</td>
                        <td>{{ $item->program_name }}</td>
                        <td>{{ $item->student_engagement }}</td>
                        <td>{{ $item->frequency }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @endif

    @if(isset($crosstabData['satisfaction']) && count($crosstabData['satisfaction']) > 0)
        <h5 class="mt-2">Overall Satisfaction by Course and Program</h5>
        <div class="table-responsive mt-2">
            <table class="table table-bordered table-striped table-hover mb-0" id="table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Program</th>
                        <th>Overall Satisfaction</th>
                        <th>Frequency</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crosstabData['satisfaction'] as $item)
                        <tr>
                            <td>{{ $item->course_name }}</td>
                            <td>{{ $item->program_name }}</td>
                            <td>{{ $item->overall_satisfaction }}</td>
                            <td>{{ $item->frequency }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if(isset($crosstabData['relevance']) && count($crosstabData['relevance']) > 0)
        <h5 class="mt-2">Course Relevance by Course and Program</h5>
        <div class="table-responsive mt-2">
            <table class="table table-bordered table-striped table-hover mb-0" id="table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Program</th>
                        <th>Course Relevance</th>
                        <th>Frequency</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crosstabData['relevance'] as $item)
                        <tr>
                            <td>{{ $item->course_name }}</td>
                            <td>{{ $item->program_name }}</td>
                            <td>{{ $item->course_relevance }}</td>
                            <td>{{ $item->frequency }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if(isset($crosstabData['technology']) && count($crosstabData['technology']) > 0)
        <h5 class="mt-2">Use of Technology by Course and Program</h5>
        <div class="table-responsive mt-2">
            <table class="table table-bordered table-striped table-hover mb-0" id="table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Program</th>
                        <th>Use of Technology</th>
                        <th>Frequency</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crosstabData['technology'] as $item)
                        <tr>
                            <td>{{ $item->course_name }}</td>
                            <td>{{ $item->program_name }}</td>
                            <td>{{ $item->use_of_technology }}</td>
                            <td>{{ $item->frequency }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if(isset($crosstabData['lectureTimeStart']) && count($crosstabData['lectureTimeStart']) > 0)
        <h5 class="mt-2">Lecture Start Time by Course and Program</h5>
        <div class="table-responsive mt-2">
            <table class="table table-bordered table-striped table-hover mb-0" id="table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Program</th>
                        <th>Lecture Start Time</th>
                        <th>Frequency</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crosstabData['lectureTimeStart'] as $item)
                        <tr>
                            <td>{{ $item->course_name }}</td>
                            <td>{{ $item->program_name }}</td>
                            <td>{{ $item->lecture_time_start }}</td>
                            <td>{{ $item->frequency }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if(isset($crosstabData['lectureTimeEnd']) && count($crosstabData['lectureTimeEnd']) > 0)
        <h5 class="mt-2">Lecture End Time by Course and Program</h5>
        <div class="table-responsive mt-2">
            <table class="table table-bordered table-striped table-hover mb-0" id="table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Program</th>
                        <th>Lecture End Time</th>
                        <th>Frequency</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crosstabData['lectureTimeEnd'] as $item)
                        <tr>
                            <td>{{ $item->course_name }}</td>
                            <td>{{ $item->program_name }}</td>
                            <td>{{ $item->lecture_time_end }}</td>
                            <td>{{ $item->frequency }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if(isset($crosstabData['assessmentFeedback']) && count($crosstabData['assessmentFeedback']) > 0)
        <h5 class="mt-2">Assessment Feedback by Course and Program</h5>
        <div class="table-responsive mt-2">
            <table class="table table-bordered table-striped table-hover mb-0" id="table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Program</th>
                        <th>Assessment Feedback</th>
                        <th>Frequency</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crosstabData['assessmentFeedback'] as $item)
                        <tr>
                            <td>{{ $item->course_name }}</td>
                            <td>{{ $item->program_name }}</td>
                            <td>{{ $item->assessment_feedback }}</td>
                            <td>{{ $item->frequency }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function createBarChart(canvasId, data, title) {
            const ctx = document.getElementById(canvasId).getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        label: title,
                        data: Object.values(data),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(199, 21, 133, 0.6)',
                            'rgba(238, 130, 238, 0.6)',
                            'rgba(0, 128, 0, 0.6)',
                            'rgba(218, 165, 32, 0.6)',
                            'rgba(107, 142, 35, 0.6)',
                            'rgba(255, 0, 0, 0.6)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(199, 21, 133, 1)',
                            'rgba(238, 130, 238, 1)',
                            'rgba(0, 128, 0, 1)',
                            'rgba(218, 165, 32, 1)',
                            'rgba(107, 142, 35, 1)',
                            'rgba(255, 0, 0, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: title,
                            font: {
                                size: 16
                            }
                        },
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        label += context.parsed.y;
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        }

        // Create charts
        const modalityData = @json($modalityCounts);
        createBarChart('modalityChart', modalityData, 'Teaching Modality');

        const materialsData = @json($materialCounts);
        createBarChart('materialsChart', materialsData, 'Learning Materials');

        const punctualityData = @json($punctualityCounts);
        createBarChart('punctualityChart', punctualityData, 'Lecturer Punctuality');

        const understandingData = @json($understandingCounts);
        createBarChart('understandingChart', understandingData, 'Content Understanding');

        const engagementData = @json($engagementCounts);
        createBarChart('engagementChart', engagementData, 'Student Engagement');

        const satisfactionData = @json($satisfactionCounts);
        createBarChart('satisfactionChart', satisfactionData, 'Overall Student Satisfaction');

        const relevanceData = @json($relevanceCounts);
        createBarChart('relevanceChart', relevanceData, 'Course Relevance');

        const technologyData = @json($technologyCounts);
        createBarChart('technologyChart', technologyData, 'Use of Technology');

        const lectureTimeStartData = @json($lectureTimeStartCounts);
        createBarChart('lectureTimeStartChart', lectureTimeStartData, 'Lecture Time Start');

        const lectureTimeEndData = @json($lectureTimeEndCounts);
        createBarChart('lectureTimeEndChart', lectureTimeEndData, 'Lecture Time End');

        const assessmentFeedbackData = @json($assessmentFeedbackCounts);
        createBarChart('assessmentFeedbackChart', assessmentFeedbackData, 'Assessment Feedback');
    </script>
@endsection
<?php

use App\Models\AcademicYear;
use App\Models\College;
use App\Models\Department;
use App\Models\Program;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Student;
use Illuminate\Support\Str;

// Create Academic Years
AcademicYear::create(['name' => '2020/2021']);
AcademicYear::create(['name' => '2021/2022']);
AcademicYear::create(['name' => '2022/2023']);
AcademicYear::create(['name' => '2023/2024']);
AcademicYear::create(['name' => '2024/2025']);
foreach (range(2025, 2030) as $year) {
    AcademicYear::create(['name' => $year . '/' . ($year + 1)]);
}
echo "Academic Years created.\n";

// Create Colleges
$collegeEngineering = College::create(['name' => 'College of Engineering', 'HOD_name' => 'Dr. John Doe']);
$collegeScience = College::create(['name' => 'College of Science', 'HOD_name' => 'Prof. Jane Smith']);
$collegeArts = College::create(['name' => 'College of Arts and Social Sciences', 'HOD_name' => 'Dr. Peter Jones']);
$collegeBusiness = College::create(['name' => 'College of Business', 'HOD_name' => 'Prof. Alice Brown']);
$collegeMedicine = College::create(['name' => 'College of Medicine', 'HOD_name' => 'Dr. Robert Green']);
echo "Colleges created.\n";

// Create Departments
$deptCS = Department::create(['college_id' => $collegeEngineering->id, 'name' => 'Computer Science']);
$deptEE = Department::create(['college_id' => $collegeEngineering->id, 'name' => 'Electrical Engineering']);
$deptME = Department::create(['college_id' => $collegeEngineering->id, 'name' => 'Mechanical Engineering']);
$deptPhysics = Department::create(['college_id' => $collegeScience->id, 'name' => 'Physics']);
$deptChemistry = Department::create(['college_id' => $collegeScience->id, 'name' => 'Chemistry']);
$deptMath = Department::create(['college_id' => $collegeScience->id, 'name' => 'Mathematics']);
$deptHistory = Department::create(['college_id' => $collegeArts->id, 'name' => 'History']);
$deptSociology = Department::create(['college_id' => $collegeArts->id, 'name' => 'Sociology']);
$deptEconomics = Department::create(['college_id' => $collegeBusiness->id, 'name' => 'Economics']);
$deptAccounting = Department::create(['college_id' => $collegeBusiness->id, 'name' => 'Accounting']);
$deptMedicineGeneral = Department::create(['college_id' => $collegeMedicine->id, 'name' => 'General Medicine']);
$deptPharmacy = Department::create(['college_id' => $collegeMedicine->id, 'name' => 'Pharmacy']);
foreach (range(1, 20) as $i) {
    Department::create(['college_id' => fake()->randomElement([$collegeEngineering->id, $collegeScience->id, $collegeArts->id, $collegeBusiness->id, $collegeMedicine->id]), 'name' => fake()->unique()->word() . ' Studies']);
}
echo "Departments created.\n";

// Create Programs
$progSE = Program::create(['department_id' => $deptCS->id, 'name' => 'Software Engineering']);
$progCE = Program::create(['department_id' => $deptCS->id, 'name' => 'Computer Engineering']);
$progEE = Program::create(['department_id' => $deptEE->id, 'name' => 'Electrical Power Engineering']);
$progPhysicsBS = Program::create(['department_id' => $deptPhysics->id, 'name' => 'Bachelor of Science in Physics']);
$progChemistryBS = Program::create(['department_id' => $deptChemistry->id, 'name' => 'Bachelor of Science in Chemistry']);
$progHistoryBA = Program::create(['department_id' => $deptHistory->id, 'name' => 'Bachelor of Arts in History']);
$progEconomicsBA = Program::create(['department_id' => $deptEconomics->id, 'name' => 'Bachelor of Arts in Economics']);
$progAccountingBCom = Program::create(['department_id' => $deptAccounting->id, 'name' => 'Bachelor of Commerce in Accounting']);
$progMedicineMD = Program::create(['department_id' => $deptMedicineGeneral->id, 'name' => 'Doctor of Medicine']);
$progPharmacyBPharm = Program::create(['department_id' => $deptPharmacy->id, 'name' => 'Bachelor of Pharmacy']);
foreach (range(1, 20) as $i) {
    Program::create(['department_id' => Department::inRandomOrder()->first()->id, 'name' => fake()->unique()->sentence(3)]);
}
echo "Programs created.\n";

// Create Courses
$courseIntroProg = Course::create(['program_id' => $progSE->id, 'name' => 'Introduction to Programming']);
$courseDataStruct = Course::create(['program_id' => $progSE->id, 'name' => 'Data Structures and Algorithms']);
$courseDatabase = Course::create(['program_id' => $progSE->id, 'name' => 'Database Systems']);
$courseCompArch = Course::create(['program_id' => $progCE->id, 'name' => 'Computer Architecture']);
$courseCircuits = Course::create(['program_id' => $progEE->id, 'name' => 'Electric Circuits']);
$courseClassicalMech = Course::create(['program_id' => $progPhysicsBS->id, 'name' => 'Classical Mechanics']);
$courseQuantumMech = Course::create(['program_id' => $progPhysicsBS->id, 'name' => 'Quantum Mechanics']);
$courseOrganicChem = Course::create(['program_id' => $progChemistryBS->id, 'name' => 'Organic Chemistry']);
$courseInorganicChem = Course::create(['program_id' => $progChemistryBS->id, 'name' => 'Inorganic Chemistry']);
$courseWorldHistory1 = Course::create(['program_id' => $progHistoryBA->id, 'name' => 'World History I']);
$courseMicroeconomics = Course::create(['program_id' => $progEconomicsBA->id, 'name' => 'Microeconomics']);
$courseFinancialAcc = Course::create(['program_id' => $progAccountingBCom->id, 'name' => 'Financial Accounting']);
$courseHumanAnatomy = Course::create(['program_id' => $progMedicineMD->id, 'name' => 'Human Anatomy']);
$coursePharmaceutics = Course::create(['program_id' => $progPharmacyBPharm->id, 'name' => 'Pharmaceutics']);
foreach (range(1, 30) as $i) {
    Course::create(['program_id' => Program::inRandomOrder()->first()->id, 'name' => fake()->unique()->sentence(4)]);
}
echo "Courses created.\n";

// Create Instructors
Instructor::create(['department_id' => $deptCS->id, 'course_id' => $courseIntroProg->id, 'name' => 'Dr. Alice Johnson']);
Instructor::create(['department_id' => $deptCS->id, 'course_id' => $courseDataStruct->id, 'name' => 'Prof. Bob Williams']);
Instructor::create(['department_id' => $deptEE->id, 'course_id' => $courseCircuits->id, 'name' => 'Dr. Carol Davis']);
Instructor::create(['department_id' => $deptPhysics->id, 'course_id' => $courseClassicalMech->id, 'name' => 'Prof. David Garcia']);
Instructor::create(['department_id' => $deptChemistry->id, 'course_id' => $courseOrganicChem->id, 'name' => 'Dr. Emily Rodriguez']);
Instructor::create(['department_id' => $deptHistory->id, 'course_id' => $courseWorldHistory1->id, 'name' => 'Prof. Frank Martinez']);
Instructor::create(['department_id' => $deptEconomics->id, 'course_id' => $courseMicroeconomics->id, 'name' => 'Dr. Grace Lopez']);
Instructor::create(['department_id' => $deptAccounting->id, 'course_id' => $courseFinancialAcc->id, 'name' => 'Prof. Henry Wilson']);
Instructor::create(['department_id' => $deptMedicineGeneral->id, 'course_id' => $courseHumanAnatomy->id, 'name' => 'Dr. Ivy Taylor']);
Instructor::create(['department_id' => $deptPharmacy->id, 'course_id' => $coursePharmaceutics->id, 'name' => 'Prof. Jack Anderson']);
foreach (range(1, 30) as $i) {
    Instructor::create(['department_id' => Department::inRandomOrder()->first()->id, 'course_id' => Course::inRandomOrder()->first()->id, 'name' => fake()->name()]);
}
echo "Instructors created.\n";

// Create Students
$academicYears = AcademicYear::all()->pluck('id')->toArray();
$programs = Program::all()->pluck('id')->toArray();
$courses = Course::all()->pluck('id')->toArray();
$departments = Department::all()->pluck('id')->toArray();

foreach (range(1, 35) as $i) {
    $programId = fake()->randomElement($programs);
    $courseId = Course::where('program_id', $programId)->inRandomOrder()->first()->id ?? fake()->randomElement($courses);
    $departmentId = Program::find($programId)->department_id ?? fake()->randomElement($departments);
    $academicYearId = fake()->randomElement($academicYears);

    Student::create([
        'registration_number' => 'REG-' . fake()->unique()->randomNumber(5),
        'token' => Str::random(10),
        'academic_year_id' => $academicYearId,
        'semester' => fake()->randomElement(['Fall', 'Spring', 'Summer']),
        'program_id' => $programId,
        'course_id' => $courseId,
        'department_id' => $departmentId,
    ]);
}
echo "Students created.\n";

?>
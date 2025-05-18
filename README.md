## Course and Semester Evaluation System

## Laravel and Android Development

We are pleased to announce the open-source release of our comprehensive course and semester evaluation system. This full-stack application is built with a robust architecture, featuring:

* **Web Administration Panel:** Developed using the Laravel PHP framework.
* **Student Mobile Application:** Developed using Android Jetpack Compose for a modern and intuitive user experience.

This system is designed to facilitate the efficient evaluation of courses.

The core technologies and tools employed in this project include:

* PHP  / LARAVEL API
* Kotlin Programming Language
* MySQL
* Android Jetpack Compose

**Live Demonstrations:**

* **API & Management Information System (MIS):** [http://swahiliict.scienceontheweb.net/](http://swahiliict.scienceontheweb.net/)
* **Android Application:** [https://play.google.com/store/apps/details?id=com.college.courseevaluation](https://play.google.com/store/apps/details?id=com.college.courseevaluation)

**Documentation:**

* **API & MIS Documentation:** [https://github.com/shamiraty/college-assessment-api](https://github.com/shamiraty/college-assessment-api)
* **Android Application Documentation:** [shamiraty/course-evaluation-app](https://github.com/shamiraty/course-evaluation-app)

This document provides a comprehensive overview of the Student Management Application's functionality, based on the provided source code. The application is designed to manage student data, courses, and program information, and it includes an API for data exchange with an Android application, specifically for handling course evaluations.

##     *APPLICATION DESCRIPTION*

The Student Management Application is a web-based system that manages data related to students, courses, and programs. Key features include:

* Student data management, including registration numbers, academic years, and program/course enrollment.
* Course and program management.
* An API for handling requests from an Android application.
* Management of API keys for secure access.
* Course evaluation data processing and trend analysis.

The Android application allows students to perform course evaluations, and this application processes that data to show trends. Student information, including tokens, registration numbers, and enrolled courses, must be present in this system for the Android app to function correctly. The API uses keys with expiration dates for security.

##     *CONTROLLERS*

The application uses a series of controllers to manage different aspects of the system. Here's a breakdown of each controller and its functions:

###     *1. Controller.php*

* This file defines an abstract `Controller` class. In Laravel, abstract controllers are often used as a base class for other controllers. It's meant to provide shared functionality. In this case, it's empty, suggesting it might be intended for future use or adheres to a convention.

###     *2. AcademicYearController.php*

This controller manages academic years.

| Function | Description |
| --- | --- |
| `index()` | Retrieves all academic years with their students and displays them. |
| `create()` | Displays the form to create a new academic year. |
| `store(Request $request)` | Stores a new academic year in the database after validating the input. |
| `edit(AcademicYear $academicYear)` | Displays the form to edit an existing academic year. |
| `update(Request $request, AcademicYear $academicYear)` | Updates an existing academic year in the database after validation. |
| `destroy(AcademicYear $academicYear)` | Deletes an academic year. |

###     *3. ApiKeyController.php*

This controller manages API keys, which are used for authentication.

| Function | Description |
| --- | --- |
| `index()` | Displays a listing of all API keys. |
| `create()` | Displays the form to create a new API key. |
| `store(Request $request)` | Stores a new API key in the database, validating the username, password, and end date. It also generates the key. |
| `edit(ApiKey $apiKey)` | Displays the form to edit an existing API key. |
| `update(Request $request, ApiKey $apiKey)` | Updates an existing API key, including the username, end date, and password (if provided). |
| `destroy(ApiKey $apiKey)` | Deletes an API key. |

###     *4. CollegeController.php*

This controller manages college information.

| Function | Description |
| --- | --- |
| `index()` | Retrieves all colleges with their departments and displays them. |
| `create()` | Displays the form to create a new college. |
| `store(Request $request)` | Stores a new college in the database after validating the name and HOD name. |
| `edit(College $college)` | Displays the form to edit an existing college. |
| `update(Request $request, College $college)` | Updates an existing college's information. |
| `destroy(College $college)` | Deletes a college. |

###     *5. CourseController.php*

This controller manages courses.

| Function | Description |
| --- | --- |
| `index()` | Retrieves all courses with their associated program information. |
| `api_index()` | Retrieves course data (id, name, code, and program name) for the API, formatted for consumption by the Android app. Crucially, it includes the program *name* rather than the ID. |
| `create()` | Displays the form to create a new course, including a list of programs. |
| `store(Request $request)` | Stores a new course in the database, validating the name and program ID. |
| `edit(Course $course)` | Displays the form to edit a course. |
| `update(Request $request, Course $course)` | Updates a course's information. |
| `destroy(Course $course)` | Deletes a course. |

###     *6. CourseEvaluationController.php*

This controller handles course evaluations submitted by students.

| Function | Description |
| --- | --- |
| `storeApi(Request $request)` | This is a crucial function for the API. It receives and stores course evaluation data from the Android application. It validates the student ID (using the registration number), token number, course ID, and evaluation parameters (teaching modality, learning materials, etc.). It expects `student_id` to be the student's registration number. |
| `index()` | Retrieves and processes course evaluation data for analysis and display. It calculates totals, counts, and crosstabulations for various evaluation metrics. It prepares an array of data for JSON encoding, suitable for generating trends or reports. |

###     *7. DepartmentController.php*

This controller manages departments.

| Function | Description |
| --- | --- |
| `index()` | Retrieves all departments, including the college they belong to. |
| `create()` | Displays the form to create a new department, including a dropdown of colleges. |
| `store(Request $request)` | Stores a new department, validating the name and college ID. |
| `edit(Department $department)` | Displays the form to edit a department. |
| `update(Request $request, Department $department)` | Updates a department's information. |
| `destroy(Department $department)` | Deletes a department. |

###     *8. InstructorController.php*

This controller manages instructors.

| Function | Description |
| --- | --- |
| `index()` | Retrieves all instructors with their department and course information. |
| `create()` | Displays the form to create a new instructor, including dropdowns for departments and courses. |
| `store(Request $request)` | Stores a new instructor, validating the name, department ID, and course ID. |
| `edit(Instructor $instructor)` | Displays the form to edit an instructor. |
| `update(Request $request, Instructor $instructor)` | Updates an instructor's information. |
| `destroy(Instructor $instructor)` | Deletes an instructor. |

###     *9. ProgramController.php*

This controller manages academic programs.

| Function | Description |
| --- | --- |
| `index()` | Retrieves all programs with their associated department. |
| `create()` | Displays the form to create a new program, including a department dropdown. |
| `store(Request $request)` | Stores a new program, validating the name and department ID. |
| `edit(Program $program)` | Displays the form to edit a program. |
| `update(Request $request, Program $program)` | Updates a program's information. |
| `destroy(Program $program)` | Deletes a program. |

###     *10. StudentController.php*

This controller manages student data.

| Function | Description |
| --- | --- |
| `index()` | Retrieves all students with their academic year, program, course, department, and course evaluation information. |
| `create()` | Displays the form to create a new student, including dropdowns for academic years, programs, courses, and departments. |
| `store(Request $request)` | Stores a new student, validating registration number, academic year ID, program ID, course ID, and department ID. It also generates a unique token number. |
| `edit(Student $student)` | Displays the form to edit an existing student. |
| `update(Request $request, Student $student)` | Updates a student's information. |
| `destroy(Student $student)` | Deletes a student. |

##     *MIDDLEWARE*

###     *11. ApiKeyMiddleware.php*

This middleware is used to authenticate API requests by checking for a valid and unexpired API key in the request header.

| Function | Description |
| --- | --- |
| `handle(Request $request, Closure $next)` |  This function intercepts incoming requests to the application's API.  It first checks for the presence of an `X-API-KEY` in the request headers. If the key is missing, it returns a 401 Unauthorized error.  If the key is present, it queries the `api_keys` table to validate the key against the provided API key, and also ensures that the key has not expired (i.e., the `end_date` is on or after the current date).  It also checks the `status` of the API key. If the status is false, the request is rejected.  If the API key is valid, the middleware updates the `last_used` timestamp and increments the `number_of_requests` counter in the `api_keys` table. It also saves access history. Finally, it allows the request to proceed to the next handler in the application. |

##     *SERVICE PROVIDERS*

###     *12. AppServiceProvider.php*

This service provider is used to register services and configure the application.

| Function | Description |
| --- | --- |
| `register()` |  This method is empty in the provided code, meaning no specific services are registered here.  In Laravel, this method is used to bind classes or interfaces into the application's service container. |
| `boot()` |  This method is used to perform any application bootstrapping tasks. In this case, it defines a route group prefixed with `api`.  It applies the `apiKey` middleware to all routes within this group, effectively protecting them with the API key authentication.  Specifically, it registers three routes:  `/course-evaluations` (POST, handled by `CourseEvaluationController@storeApi`), `/courses` (GET, handled by `CourseController@api_index`), and `/dashboard-data` (GET, handled by `CourseEvaluationController@indexAPI`). |

##     *RELATIONSHIPS*

The application manages the following relationships:

* Students belong to an Academic Year, Program, Course, and Department.
* Courses belong to a Program.
* Programs belong to a Department.
* Departments belong to a College.
* Instructors belong to a Department and teach a Course.
* Course Evaluations are associated with a Student and a Course.
* API Keys are associated with a username and have an end date.

##     *API Considerations*

* The application provides an API for the Android application to submit course evaluations.
* The `CourseEvaluationController.php` `storeApi` function handles this submission. It validates the student's registration number and a token.
* The `ApiKeyController` manages API keys, which likely provide secure access to the API. Keys have expiration dates.
* The `ApiKeyMiddleware` ensures that only requests with valid, unexpired, and active API keys can access the API endpoints.
* The Android app needs the student's registration number, token, and course ID.

##     *DATA FLOW*

1.  **Student Data Entry**: Student information (registration number, academic year, program, course, department) is entered into the system. A token is generated for each student.
2.  **Course Evaluation (Android App)**:
    * The student uses the Android app to submit a course evaluation.
    * The Android app sends the student's registration number, token, course ID, and evaluation data to the `/course-evaluations` endpoint.
    * The `ApiKeyMiddleware` verifies the `X-API-KEY` in the request header.
    * The `CourseEvaluationController`'s `storeApi` method processes the data.
3.  **Data Processing**: The `CourseEvaluationController` processes the evaluation data.
4.  **Trend Analysis**: The `index` function in `CourseEvaluationController` retrieves and analyzes the evaluation data to calculate trends.
5.  **API Key Authentication**: The API uses API keys (managed by `ApiKeyController` and enforced by `ApiKeyMiddleware`) to authenticate requests, including course evaluation submissions from the Android app.

##     *SECURITY*

* API keys are used for authentication. These keys have expiration dates, enhancing security.
* Input validation is used in all controllers to protect against malicious data.
* Password hashing is used when storing API key passwords.
* The `ApiKeyMiddleware` checks for missing, invalid, expired, or inactive API keys, preventing unauthorized access to API endpoints.

##     *SUMMARY*

This Student Management Application provides a comprehensive system for managing student, course, and program data. It includes an API to facilitate course evaluations from an Android application. The application uses a series of controllers to manage data, enforce relationships, and provide a secure interface.  The `ApiKeyMiddleware` plays a crucial role in securing the API, and the `AppServiceProvider` configures the routing and middleware for the API.

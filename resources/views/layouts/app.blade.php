<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ura')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/date_range.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
    @stack('styles')
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 18px;
            /*background-color: #f8f9fa*/;
        }
        /* Transition kwa button zote zilizo na class .btn */
.btn {
    transition: all 0.3s ease-in-out;
}

.btn:hover {
    transform: scale(1.1); /* Kuongeza size kidogo */
    background-color: #007bff !important; /* Badilisha rangi */
    color: white !important;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}

/* Transition kwa list-group-item */
.list-group-item {
    transition: all 0.3s ease-in-out;
}

.list-group-item:hover {
    transform: translateX(10px); /* Sogeza kidogo upande wa kulia */
    background-color: #f8f9fa !important; /* Badilisha rangi */
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
}

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-sm" data-bs-theme="light">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="{{ url('/') }}">Administration</a>
        <button class="navbar-toggler text-primary bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav me-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bars"></i> Navigation
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li>
                <a class="dropdown-item {{ Request::routeIs('colleges.index') ? 'active' : '' }}" href="{{ route('colleges.index') }}">
                    <i class="fas fa-university"></i> Colleges
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item {{ Request::routeIs('departments.index') ? 'active' : '' }}" href="{{ route('departments.index') }}">
                    <i class="fas fa-building"></i> Departments
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item {{ Request::routeIs('courses.index') ? 'active' : '' }}" href="{{ route('courses.index') }}">
                    <i class="fas fa-book"></i> Courses
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item {{ Request::routeIs('instructors.index') ? 'active' : '' }}" href="{{ route('instructors.index') }}">
                    <i class="fas fa-chalkboard-teacher"></i> Instructors
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item {{ Request::routeIs('programs.index') ? 'active' : '' }}" href="{{ route('programs.index') }}">
                    <i class="fas fa-graduation-cap"></i> Programs
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item {{ Request::routeIs('academic_years.index') ? 'active' : '' }}" href="{{ route('academic_years.index') }}">
                    <i class="fas fa-calendar-alt"></i> Academic Years
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item {{ Request::routeIs('course_evaluations.index') ? 'active' : '' }}" href="{{ route('course_evaluations.index') }}">
                    <i class="fas fa-chart-bar"></i> Analytics
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item {{ Request::routeIs('api-keys.index') ? 'active' : '' }}" href="{{ route('api-keys.index') }}">
                    <i class="fas fa-key"></i> API users
                </a>
            </li>
        </ul>
    </li>
</ul>

        </div>
    </div>
</nav>
    <div class="container-fluid mt-5 pt-5 ">
        @yield('content')
     </div>
    <script src="{{ asset('assets/css/jquery.js') }}"></script>
    <script src="{{ asset('assets/css/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/css/datatable.js') }}"></script>
    <script src="{{ asset('assets/css/datatable5.js') }}"></script>
    <script src="{{ asset('assets/css/select2.js') }}"></script>
    <script src="{{ asset('assets/css/date_range.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "lengthChange": false,  // Hides "Show X entries"
                "searching": false,    // Hides the search bar
                "info": false ,         // Hides "Showing 1 of X"
                "pageLength": 12
            });
        });
    </script>

    <script>
      // Show the progress modal on form submission
      $('#importForm').on('submit', function() {
        $('#progressModal').modal('show');
      });
    </script>
    <script>
    $(document).ready(function() {
        $('#deleteForm').on('submit', function() {
            $('#progressModal').modal('show');
        });
    });
</script>
    @stack('scripts')

</body>
</html>
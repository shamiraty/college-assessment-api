@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Course Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $course->name }}</h5>
                <p class="card-text"><strong>Program:</strong> {{ $course->program->name }}</p>
            </div>
        </div>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection
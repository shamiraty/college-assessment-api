@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Instructor Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $instructor->name }}</h5>
                <p class="card-text"><strong>Department:</strong> {{ $instructor->department->name }}</p>
                <p class="card-text"><strong>Course:</strong> {{ $instructor->course->name }}</p>
            </div>
        </div>
        <a href="{{ route('instructors.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection
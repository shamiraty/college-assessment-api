@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Academic Year Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $academicYear->name }}</h5>
            </div>
        </div>
        <a href="{{ route('academic_years.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection
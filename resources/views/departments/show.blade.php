@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Department Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $department->name }}</h5>
                <p class="card-text"><strong>College:</strong> {{ $department->college->name }}</p>
            </div>
        </div>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection
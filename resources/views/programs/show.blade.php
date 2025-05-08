@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Program Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $program->name }}</h5>
                <p class="card-text"><strong>Department:</strong> {{ $program->department->name }}</p>
            </div>
        </div>
        <a href="{{ route('programs.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>College Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $college->name }}</h5>
                <p class="card-text"><strong>HOD Name:</strong> {{ $college->HOD_name }}</p>
            </div>
        </div>
        <a href="{{ route('colleges.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Academic Year</h1>

        <form action="{{ route('academic_years.update', $academicYear->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $academicYear->name }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('academic_years.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

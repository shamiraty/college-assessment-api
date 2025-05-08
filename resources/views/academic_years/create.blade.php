@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Academic Year</h1>

        <form action="{{ route('academic_years.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('academic_years.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
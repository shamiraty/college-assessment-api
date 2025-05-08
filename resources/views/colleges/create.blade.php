@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create College</h1>

        <form action="{{ route('colleges.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                 @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
            </div>
            <div class="form-group">
                <label for="HOD_name">HOD Name:</label>
                <input type="text" name="HOD_name" id="HOD_name" class="form-control @error('HOD_name') is-invalid @enderror" value="{{ old('HOD_name') }}" required>
                @error('HOD_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
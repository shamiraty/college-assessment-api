@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit College</h1>

        <form action="{{ route('colleges.update', $college->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $college->name }}" required>
                 @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
            </div>
            <div class="form-group">
                <label for="HOD_name">HOD Name:</label>
                <input type="text" name="HOD_name" id="HOD_name" class="form-control @error('HOD_name') is-invalid @enderror" value="{{ $college->HOD_name }}" required>
                @error('HOD_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
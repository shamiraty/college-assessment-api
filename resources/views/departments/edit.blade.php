@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Department</h1>

        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $department->name }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="college_id">College:</label>
                <select name="college_id" id="college_id" class="form-control @error('college_id') is-invalid @enderror" required>
                    <option value="">Select College</option>
                    @foreach ($colleges as $college)
                        <option value="{{ $college->id }}" {{ $department->college_id == $college->id ? 'selected' : '' }}>{{ $college->name }}</option>
                    @endforeach
                </select>
                @error('college_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

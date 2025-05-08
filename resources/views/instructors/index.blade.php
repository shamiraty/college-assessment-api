@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Instructors</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('instructors.create') }}" class="btn btn-primary mb-3">Create Instructor</a>

        <table class="table table-bordered table-hover table-striped" id="table">
        <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instructors as $instructor)
                    <tr>
                        <td>{{ $instructor->name }}</td>
                        <td>{{ $instructor->department->name }}</td>
                        <td>{{ $instructor->course->name }}</td>
                        <td>
                            <a href="{{ route('instructors.show', $instructor->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('instructors.edit', $instructor->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('instructors.destroy', $instructor->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

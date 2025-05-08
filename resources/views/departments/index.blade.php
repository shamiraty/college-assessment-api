@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Departments</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
         @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Create Department</a>

        <table class="table table-bordered table-hover table-striped" id="table">
        <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>College</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->college->name }}</td> {{-- Display college name --}}
                        <td>
                            <a href="{{ route('departments.show', $department->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline">
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

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Programs</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('programs.create') }}" class="btn btn-primary mb-3">Create Program</a>

        <table class="table table-bordered table-hover table-striped" id="table">
        <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programs as $program)
                    <tr>
                        <td>{{ $program->name }}</td>
                        <td>{{ $program->department->name }}</td>
                        <td>
                            <a href="{{ route('programs.show', $program->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="d-inline">
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
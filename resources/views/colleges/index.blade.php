@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Colleges</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
             <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('colleges.create') }}" class="btn btn-primary mb-3">Create College</a>

        <table class="table table-bordered table-hover table-striped" id="table">
        <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>HOD Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colleges as $college)
                    <tr>
                        <td>{{ $college->name }}</td>
                        <td>{{ $college->HOD_name }}</td>
                        <td>
                            <a href="{{ route('colleges.show', $college->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('colleges.destroy', $college->id) }}" method="POST" class="d-inline">
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
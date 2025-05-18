@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Academic Years</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('academic_years.create') }}" class="btn btn-primary mb-3">Create Academic Year</a>

        <table class="table table-bordered table-hover table-striped" id="table">
            <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($academicYears as $academicYear)
                    <tr>
                        <td>{{ $academicYear->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('academic_years.show', $academicYear->id) }}" class="btn btn-sm btn-info">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('academic_years.edit', $academicYear->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('academic_years.destroy', $academicYear->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

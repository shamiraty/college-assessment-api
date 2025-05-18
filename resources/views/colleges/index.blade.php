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
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colleges as $college)
                    <tr>
                        <td>{{ $college->name }}</td>
                        <td>{{ $college->HOD_name }}</td>
                        <td class="text-center">
                            <a href="{{ route('colleges.show', $college->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pencil-square"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('colleges.destroy', $college->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

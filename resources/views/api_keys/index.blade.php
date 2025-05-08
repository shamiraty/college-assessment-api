@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>API Keys</h1>
        <a href="{{ route('api-keys.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i> Add New API Key
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover mb-0" id="table">
            <thead class="table-primary">
                <tr>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Last Login</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($apiKeys as $apiKey)
                    <tr>
                        <td>{{ $apiKey->username }}</td>
                        <td><span class="badge bg-{{ $apiKey->status ? 'success' : 'danger' }}">{{ $apiKey->status ? 'Active' : 'Inactive' }}</span></td>
                        <td><span class="">{{ $apiKey->last_used ? $apiKey->last_used->diffForHumans() : 'Never' }}</span></td>
                        <td>
                            <a href="{{ route('api-keys.show', $apiKey) }}" class="btn btn-sm btn-info" title="View Details">
                                <i class="fas fa-eye me-1"></i> View
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('api-keys.edit', $apiKey) }}" class="btn btn-sm btn-primary" title="Edit">
                                <i class="fas fa-pencil-square me-1"></i> Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('api-keys.destroy', $apiKey) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this API Key?')">
                                    <i class="fas fa-trash me-1"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">No API keys found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#table').DataTable(); // Initialize DataTables
    });
</script>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

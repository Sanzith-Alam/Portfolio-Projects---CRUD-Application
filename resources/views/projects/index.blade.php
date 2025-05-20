@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Portfolio Projects</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Add New Project</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>
                        <span class="badge bg-{{ $project->status === 'published' ? 'success' : 'secondary' }}">
                            {{ ucfirst($project->status) }}
                        </span>
                    </td>
                    <td>
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" width="50" height="50" class="img-thumbnail">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
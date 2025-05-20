@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ $project->title }}</h1>
        <div>
            <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid rounded">
                    @endif
                </div>
                <div class="col-md-8">
                    <p><strong>Status:</strong> 
                        <span class="badge bg-{{ $project->status === 'published' ? 'success' : 'secondary' }}">
                            {{ ucfirst($project->status) }}
                        </span>
                    </p>
                    
                    @if($project->project_url)
                        <p><strong>Project URL:</strong> <a href="{{ $project->project_url }}" target="_blank">{{ $project->project_url }}</a></p>
                    @endif
                    
                    @if($project->description)
                        <p><strong>Description:</strong></p>
                        <p>{{ $project->description }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
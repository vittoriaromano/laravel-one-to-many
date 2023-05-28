@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('message'))
            <h5 class="text-warning">{{ session('message') }}</h5>
        @endif
        <h2 class="my-3 text-center">Project Details</h2>
        <div class="align-items-center">
            <h4>Project's name: {{ $project->project_name }}</h4>
            @if (isset($project->image))
             <img src="{{ asset('storage/' . $project->image) }}" alt='{{ $project->project_name . ' image' }}'>
            @endif
            <div>Project's type:{{ $project->type?->name ?: ' not given' }}</div>
            <div>Project's version: {{ $project->version }}</div>
            <div>Project's description: {{ $project->description }}€</div>
            <div>Project's start date: {{ $project->start_date }}</div>
            <div>Project's upload date: {{ $project->upload_date }}</div>
            <div>Project's value: {{ $project->value  }}</div>
            <div>Project completed: {{ $project->completed == 0 ? 'no' : 'yes' }}</div>
        </div>
        <a href="{{ route('admin.projects.index')}}" class="btn btn-primary btn-sm my-2">Return to List</a>
    </div>
    
@endsection
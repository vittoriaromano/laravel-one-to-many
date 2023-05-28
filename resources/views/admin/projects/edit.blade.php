@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="d-flex align-items-center">
            <h2 class="my-3 text-center">Project Edit</h2>
        </div>

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                    <option value="">Select project's type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="project_name" class="form-label">Project name</label>
                <input type="text" class="form-control" id="project_name" name="project_name" value="{{ old('project_name', $project->project_name) }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image">
                
            </div>
            <div class="mb-3">
                <label for="version" class="form-label">Version</label>
                <input type="numeric" class="form-control" id="version" name="version" value="{{ old('version', $project->version) }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{ old('project_description', $project->description) }}">
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $project->start_date) }}" value="{{ old('', $project->start_date) }}">

                <label for="upload_date" class="form-label">Upload date</label>
                <input type="date" class="form-control" id="upload_date" name="upload_date" value="{{ old('upload_date', $project->upload_date) }}">
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Value</label>
                <input type="numeric" class="form-control" id="value" name="value" value="{{ old('value', $project->value) }}">
            </div>
            <div class="form-check">
                <label class="form-check-label" for="completed">Completed</label>
                <input class="form-check-input" type="checkbox" id="completed" name="completed" value="{{old('completed', $project->completed)}}">
            </div>
            <button type="submit" class="btn btn-success mt-3">Save</button>
        </form>
        <a href="{{ route('admin.projects.index')}}" class="btn btn-primary btn-sm my-2">Return to List</a>
    </div>
@endsection
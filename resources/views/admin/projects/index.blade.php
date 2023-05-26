@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4 text-center"> My Projects</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary my-3">New Project</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Project Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Version</th>
                    <th scope="col">Description</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Reliese Date</th>
                    <th scope="col">Value</th>
                    <th scope="col">Compleated</th>
                    <th scope="col">ciao</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->project_name }}</th>
                        <th scope="row">
                            <a href="{{ route('admin.projects.show', $project->id) }}">
                                {{ $project->project_name }}
                            </a>
                        </th>
                        <td>{{ $project->version }}</td>
                        <td>{{ $project->description }}€</td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->upload_date }}</td>
                        <td>{{ $project->value }}</td>
                        <td>{{ $project->completed == 0 ? 'no' : 'yes' }}</td>
                        <td>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                            <div>
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-outline-success my-1">Edit</a>
                            </div>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
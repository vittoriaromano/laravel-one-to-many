<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Type;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validated();
        $data = $request->all();
        $project = new Project();
        $project->fill($data);

        $project->slug = Str::slug($project->name, '-');
        $project->completed = $request['completed'] ? 1 : 0;
        $project->image = Storage::put('uploads', $data['image']);
        
        $project->save();
        return to_route('admin.projects.index')->with('message','Project created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project'), compact('types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $request->validated();
        $data = $request->all();
        $project->completed = $request['completed'] ? 1 :0;
        $project->slug = Str::slug($project->project_name, '-');
        if (isset($data['image'])) {

            if($project->image){
                Storage::delete($project->image);
            }
            $project->image = Storage::put('uploads', $data['image']);

        }
        $project->update($data);
        return to_route('admin.projects.show', $project->id)->with('message', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $direction = 'asc';
      $projects = Project::orderBy('id', $direction)->paginate(5);
      // dump($Projects);
      return view('admin.projects.index', compact('projects', 'direction'));
    }

    // funzion per filtrare id asc -> desc e viceversa
    public function orderby($direction)
    {
      $direction = $direction === 'asc' ? 'desc' : 'asc';
      $projects = Project::orderBy('id', $direction)->paginate(5);
      return view('admin.projects.index', compact('projects', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();
        // dd($form_data);
        $new_project = new Project();
        $form_data['slug'] = Project::generateSlug($form_data['title']);
        $form_data['date'] = date('Y-m-d');


        $new_project->fill($form_data);
        $new_project->save();
        return redirect()->route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
      $date = date_create($project->date);
      $data_formatted = date_format($date, 'd/m/Y');
      return view('admin.projects.show', compact('project', 'data_formatted'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
      return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
      $form_data = $request->all();


      if($project->title !== $form_data['title']){
        $form_data['slug'] = Project::generateSlug($form_data['title']);
      }else{
        // altrimenti salvo il slug il vecchio slug
        $form_data['slug']  = $project->slug;
      }

      $project->update($form_data);

      return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
      $project->delete();
      return redirect()->route('admin.projects.index')->with('deleted', "Il progetto $project->title è stata eliminata correttamente");
    }
}

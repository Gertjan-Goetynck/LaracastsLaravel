<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('owner_id', auth()->id())->get();
        //$projects = Project::all();

        return view('projects.index',['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $validated = request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required', 'min:5'],
        ]);

        Project::create($validated + ['owner_id' => auth()->id()]);

        // $project = new Project;

        // $project->title = request('title');
        // $project->description = request('description');

        // $project->save();

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // if($project->owner_id !== auth()->id()){
        //     abort(403);
        // }

        //abort_unless(auth()->user()->owns($project),403);
        //abort_if($project->owner_id !== auth()->id(),403);

        $this->authorize('update',$project);

        //abort_if(\Gate::denies('update',$project),403);

        return view('projects.show', ['project'=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    { 
        $this->authorize('update',$project);

        return view('projects.edit',['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project)
    {        
        $this->authorize('update',$project);
        $project->update(request(['title','description']));
        // $project->title = request('title');
        // $project->description = request('description');

        // $project->save();

        return redirect('projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->authorize('update',$project);

        $project->delete();

        return redirect('/projects');
    }
}

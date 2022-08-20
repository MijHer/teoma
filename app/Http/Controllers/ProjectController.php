<?php

namespace App\Http\Controllers;

use App\Events\ProjectSaved;
use App\Http\Requests\SaveProjectRequest;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $projects = Project::get();

        return view('projects.index', [
            'newProject' => new Project,
            'projects' => Project::with('category')->latest()->paginate()
        ]);
    }

    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function create()
    {
        $this->authorize('create', $project = new Project);

        return view('projects.create',[
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function store(SaveProjectRequest $request)
    {

        $project = new Project( $request->validated() );

        $this->authorize('create', $project);

        $project->image = $request->file('image')->store('images');

        $project->save();

        ProjectSaved::dispatch($project); /*SE CREA UN EVENTO EN ESTE CASO SE LLAMA ProjectSaved PARA QUE LUEGO LLAME AL LISTENER CON EL METODO DISPACTH*/

        return redirect()->route('projects.index')->with('status', 'El proyecto fue creado con exito');
    }

    public function edit(Project $project)
    {
        /*$this->authorize('update', $project);*/

        return view('projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request)
    {
        /*$this->authorize('update', $project);*/

        if ( $request->hasFile('image')) {
            Storage::delete($project->image); /*ELIMINAR LA IMAGEN QUE ESTA GUARDAD EN LA BASE DE DATOS AL MOMENTO DE ATUALIZAR*/

            $project->fill( $request->validated() );

            $project->image = $request->file('image')->store('images');

            $project->save();

            ProjectSaved::dispatch($project);

        }
        else {
            $project->update( array_filter($request->validated()) );
        }

        return redirect()->route('projects.show', $project)->with('status', 'El proyecto fue actualizado con exito');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        Storage::delete($project->image); /*ELIMINAR LA IMAGEN QUE ESTA GUARDAD EN LA BASE DE DATOS AL MOMENTO DE ATUALIZAR*/

        $project->delete();

        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con exito');
    }

}

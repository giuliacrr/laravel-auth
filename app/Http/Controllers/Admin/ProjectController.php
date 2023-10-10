<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller 
{
    /**
     * Display a listing of the resource.
     * INDEX
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.projects.index", ["projects"=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     * CREATE
     */
    public function create()
    {
        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     * STORE
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name"=>"required|string",
            "image"=>"required|image|max:5120",
            "url"=>"required|string",
            "description"=>"required|string",
            "publication_time"=>"required|date",
        ]);

        $data["slug"] = $this->generateSlug($data["name"]);
        $data["image"] = Storage::put("projects", $data["image"]);
        
        //$newProject = new Project();
        //$newProject->fill($data);
        //$newProject->save();
        //Con questa stringa, creo tutte e tre le sovrastranti in una
        $newProject = Project::create($data);

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     * SHOW
     */
    public function show($slug) {
        $project = Project::where("slug", $slug)->first(); 

        return view("admin.projects.show", ["project"=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     * EDIT
     */
    public function edit(Project $project)
    {
        
    }

    /**
     * Update the specified resource in storage.
     * UPDATE
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DESTROY
     */
    public function destroy(Project $project)
    {
        //
    }

    //Gentilmente rubato a Florian 💖
    protected function generateSlug($name) {
        // contatore da usare per avere un numero incrementale
        $counter = 0;

        do {
            // creo uno slug e se il counter è maggiore di 0, concateno il counter
            $slug = Str::slug($name) . ($counter > 0 ? "-" . $counter : "");

            // cerco se esiste già un elemento con questo slug
            $alreadyExists = Project::where("slug", $slug)->first();

            $counter++;
        } while ($alreadyExists); // finché esiste già un elemento con questo slug, ripeto il ciclo per creare uno slug nuovo

        return $slug;
    }
}

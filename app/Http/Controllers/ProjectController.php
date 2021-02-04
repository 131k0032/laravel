<?php

namespace App\Http\Controllers;



use App\Project;
use App\Category;
use App\Events\ProjectSaved;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProjectRequest;

class ProjectController extends Controller {
 


    public function __construct(){
        // Para el metodo create y edit necesito autenticacion
        // $this->middleware('auth')->only('create', 'edit');
        // Para requerir autenticacion a 5 metodos del controlador exepto al index y show (lo contrario a only)
        $this->middleware('auth')->except('index', 'show');

    }


    public function index(){

        // Obtenemos los datos de la tabla projects por fecha de creacion descendiente
        // $portfolio = Project::orderBy('created_at','DESC')->get();

       // Muestra todos los registros, paginado por 15 por defecto
        // $portfolio = Project::latest()->paginate(1);

        // // Retorna vista portfolio con var portfolio como parámetro
        // return view('portfolio', compact('portfolio'));


        return view('projects.index',[
            'projects'=>Project::latest()->paginate()
        ]);
    
    }

    // Mostar poryecto, viene de Route::get('/portfolio/{id}', 'PortfolioController@show')->name('portfolio.show');
    public function show(Project $project){
        // return $id;
        // Busca en la tabla proyecto, el proyecto que sea igual al id del parámetro

        // Para ver que retorna
        // return Project::find($id);
        
        return view('projects.show', [
            'project'=>$project
        ]);
    }


    // Crear proyecto
    public function create(){

        // Pasamos un parametro vacio en la url
        return view('projects.create',[
            'project' => new Project,
            'categories'=>Category::pluck('name','id')
        ]);
    }


    // Toma los valores del metodo POST y los inserta en la tabla Project
    public function store(SaveProjectRequest $request){

        // Guarda la imagen en storage/images
    
        // Instanciamos la variable poryecto
        $project = new Project($request->validated());
        // Guardamos la imagen
        $project->image= $request->file('image')->store('images');
        // Guardamos en bd
        $project->save();
        // Enviamos al constructor de projectSaved
        ProjectSaved::dispatch($project);

        // Redirige al l index de proyectos
        return redirect()->route('projects.index')->with('status','Proyecto creado exitosamente');
    }


    // Editar el proyecto
    public function edit(Project $project){
        return view('projects.edit', [
            'project' => $project,
            'categories'=>Category::pluck('name','id')
        ]);
    }

    // Actualizar el proyecto
    public function update(Project $project, SaveProjectRequest $request){
        // return $project;
                // Project::update([
       //      'title'=>request('title'),
       //      'url'=>request('url'),
       //      'description'=>request('description'),
       //  ]);

        if($request->hasFile('image')){
            // Borra la imagen almacenada en app/public/images/sotorage
            Storage::delete($project->image);
            // Llena los campos sin guardarlos
            $project->fill($request->validated());
            // Guardamos la imagen
            $project->image= $request->file('image')->store('images');
            // Guardamos en bd
            $project->save();
            // Enviamos al constructor de projectSaved
            ProjectSaved::dispatch($project);

        }else{
           $project->update( array_filter( $request->validated() ));
        }

        
        return redirect()->route('projects.show', $project)->with('status','Proyecto actualizado exitosamente');
    }


    // Para destroy del proyecto
    public function destroy(Project $project){
        // Borrar sin RouteBinding
        // Project::destroy($id);

        // Borra la imagen almacenada en app/public/images/sotorage
        Storage::delete($project->image);
        // Borrarse asi mismo con el RouteBinding
        $project->delete();

        return redirect()->route('projects.index')->with('status','Proyecto eliminado exitosamente');
    }


}

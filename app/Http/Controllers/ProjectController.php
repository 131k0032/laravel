<?php

namespace App\Http\Controllers;



use App\Project;
use Illuminate\Http\Request;
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
            'projects'=>Project::latest()->paginate(3)
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
            'project' => new Project
        ]);
    }


    // Toma los valores del metodo POST y los inserta en la tabla Project
    public function store(SaveProjectRequest $request){
        // return request('title');
       // Project::create([
       //      'title'=>request('title'),
       //      'url'=>request('url'),
       //      'description'=>request('description'),
       //  ]);

        // En caso de tener el mismo nombre de campo en bd y en el formulario
        // Project::create(request()->all());

        // return $request->validated();

        // Crea el registro con el metodo validated
        Project::create($request->validated());

        // Redirige al l index de proyectos
        return redirect()->route('projects.index')->with('status','Proyecto creado exitosamente');
    }


    // Editar el proyecto
    public function edit(Project $project){
        return view('projects.edit', [
            'project' => $project
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

        $project->update( $request->validated() );

        return redirect()->route('projects.show', $project)->with('status','Proyecto actualizado exitosamente');
    }


    // Para destroy del proyecto
    public function destroy(Project $project){
        // Borrar sin RouteBinding
        // Project::destroy($id);

        // Borrarse asi mismo con el RouteBinding
        $project->delete();

        return redirect()->route('projects.index')->with('status','Proyecto eliminado exitosamente');
    }


}

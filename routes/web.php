<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Parametros opcionales
// Route::get('saludos/{nombre?}' , function($nombre="invitado"){

// 	return "Saludos ". $nombre;

// });

// Rutas con nombre o darle nombre a las rutas
// Route::get('contactame', function(){
// 	return "Seccion de contactos";
// })->name('contactos');

// Route::get('/', function (){
// 	echo "<a href='".route('contactos')."'>Contactos 1</a>";
// 	echo "<a href='".route('contactos')."'>Contactos 2</a>";
// 	echo "<a href='".route('contactos')."'>Contactos 3</a>";
// 	echo "<a href='".route('contactos')."'>Contactos 4</a>";
// 	echo "<a href='".route('contactos')."'>Contactos 5</a>";
// });

// Mostrar html en las vistas
// Route::get('/', function () {
// 	// Declara variable
// 	$nombre="Bernis";

// 	// Se manda como parámetro
//     return view('home', compact('nombre'));

// })->name('home');//Nombre de la ruta

// Route::view('/', 'home', ['nombre'=>'Bernis'])->name('home');


//App::setLocale('es');//Con set locale se puede denfinir un idioma por defecto
Route::view('/', 'home')->name('home');
Route::view('/quienes-somos', 'about')->name('about');
// Route::view('/portfolio', 'portfolio', compact('portfolio'))->name('portfolio');

//Primer parámetro es nombre de ruta o url, Segundo parámetro es el nombre del controlador, sin el método __invoke con un @index o @metodo llamamos la funcion que queremos que se ejecute al ir a la ruta portfolio
// Route::get('/portafolio', 'ProjectController@index')->name('projects.index'); 
// Ruta para mostar crear, usa el PortfolioController y la funcion crear, con un name projects.show
// Route::get('/portafolio/crear', 'ProjectController@create')->name('projects.create');
// // Ruta para editar un proyecto, llamada en show.blade
// Route::get('/portafolio/{project}/editar', 'ProjectController@edit')->name('projects.edit');
// // Patch para editar por post, que para ser respetado a patch, se define en edit.balde.php, llama al metodo update,
// Route::patch('/portafolio/{project}', 'ProjectController@update')->name('projects.update');
// // USo del metodo post para guardar los nuevos poryectos via POST
// Route::post('/portafolio', 'ProjectController@store')->name('projects.store');
// // Ruta para mostar el url de un proyecto, usa el PortfolioController y la funcion show, con un name projects.show
// Route::get('/portafolio/{project}', 'ProjectController@show')->name('projects.show');
// // Ruta para eliminar el proyceto
// Route::delete('/portafolio/{project}', 'ProjectController@destroy')->name('projects.destroy');

// Route is_resource
// parametros de portafolio a project que se llame projects
Route::resource('portafolio', 'ProjectController')->parameters(['portafolio'=>'project'])->names('projects');

// Retorna la vista contact
Route::view('/contacto', 'contact')->name('contact');
// Mensaje de contacto url contacto, usa MessagesControlles@funcion store para guardar mensajes de formulario por POST
Route::post('/contact', 'MessageController@store')->name('messages.store');

// Despues de Make:auth
Auth::routes(['register'=>false]);

// Route::get('/home', 'HomeController@index')->name('home');
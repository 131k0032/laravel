<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	// Para asignacion masiva
	// protected $fillable=['title', 'url', 'description'];

	// Podemos deshabilitar la protecccion de laravel mientras
	// no usemos reques()->all()
	protected $guarded =[];


    //Para saber que tabla representa, esto setá
    // de Project=projects,
    // de lo contrario podemos definirla como
    // protected $table ='my_table'; 

	// Busca el proyecto o el registro por el url y madalo al controlador
    public function getRouteKeyName(){
    	return 'url';
    }

    // Un proyecto solo puede tener una categoria asociada, por eso está
    // en singular
    public function category(){ //$project->category
        return $this->belongsTo(Category::class);
    }
}

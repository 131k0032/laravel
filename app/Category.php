<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;
class Category extends Model
{

	// Para el url amigable
	public function getRouteKeyName(){
    	return 'url';
    }


    // Una categoria puede tener muchos protectos
    public function projects(){ //Se van a llamar category->projects
		// Tiene muchos proyectos    	
    	return $this->hasMany(Project::class);
    }
}

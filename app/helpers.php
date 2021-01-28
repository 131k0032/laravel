<?php 


// Activa los links de acuerdo a la ruta seleccionada
function setActive($routeName){
	return request()->routeIs($routeName) ? 'active' : '';
}
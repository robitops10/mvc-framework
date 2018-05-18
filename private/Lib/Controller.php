<?php 
class Controller {
	public function view ($view, $data = '') {
		if (file_exists(APP_URL . '/Views/' . $view . '.php')) {
			return require_once(APP_URL . '/Views/' . $view . '.php');
		} 	
	}

	public function model ($model) {
		if (file_exists(APP_URL . '/Models/' . $model . '.php')) {
			require_once(APP_URL . '/Models/' . $model . '.php');
			return new $model();

		} 	
	}


} # End Controller Class.
<?php 
class Homes extends Controller {
	public function __construct () {
		$this->home = $this->model('Home');
	}

	public function index ($arg) {
		$data = [
			'value' 			=> 'value',
		];
		
		$this->view('Home/index', $data);
	}



} 	# -- End Homes Class
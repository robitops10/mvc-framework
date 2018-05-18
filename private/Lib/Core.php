<?php 
class Core {
	private $controllerIndex = 'Homes';
	private $controllerMethod = 'index';
	private $params = [];

	public function __construct () {
		$url = $this->url();

		if (file_exists(APP_URL . '/Controllers/' . ucfirst($url[0]) . '.php')) {
			$this->controllerIndex = ucfirst($url[0]);
			unset($url[0]);
		} 

		require_once(APP_URL . '/Controllers/' . $this->controllerIndex . '.php');
		$this->controllerIndex = new $this->controllerIndex();

		if (isset($url[1])) {
			if (method_exists($this->controllerIndex, $url[1])) {
				$this->controllerMethod = $url[1];
				unset($url[1]);
			}
		}


		$this->params = array_values($url);

		call_user_func_array([$this->controllerIndex, $this->controllerMethod], [$this->params]);

	} # -- End __construct Method


	public function url () {
		$url = $_SERVER['QUERY_STRING'];
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = rtrim($url, '/');
		$url = explode('/', $url);

		return $url;
	}

} # --- End Core Class
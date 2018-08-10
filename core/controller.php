<?php
require_once('view.php');

class Controller {
	
	public $view;
	
	public function __construct()
	{
        session_start();
		$this->view = new View();
	}

	protected function redirect($url)
    {
        header("Location: /".$url);
        exit();
    }
	

}
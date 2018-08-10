<?php
require_once('./core/controller.php');

class Controller_Main extends Controller {

	public function action_index()
	{
		$this->view->render('main/index');
	}

	public function action_404()
    {
        $this->view->render('main/404');
    }

}
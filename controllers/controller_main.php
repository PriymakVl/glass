<?php
require_once('./core/controller.php');
require_once ('./helpers/param.php');

class Controller_Main extends Controller {

	public function action_index()
	{
		$this->view->render('main/index');
	}

	public function action_404()
    {
        $this->view->render('main/404');
    }

    public function action_login()
    {
        //if (isset($_COOKIE['username'])) $this->redirect('order/list');
        $username = Param::get('username');
        if ($username) {
            setcookie('username', $username);
            $this->redirect('order/list');
        }
        else $this->view->renderWithLayout('authorization','main/login');
    }

//    public function action_logout()
//    {
//        unset($_COOKIE['username']);
//        setcookie('username', "", time()-3600);
//        $this->redirect('main/login');
//    }

}
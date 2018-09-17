<?php
require_once('./core/controller.php');
require_once('./models/order.php');
require_once('./models/order_statistics.php');
require_once ('./helpers/param.php');
require_once ('./helpers/message.php');


class Controller_Statistics extends Controller {

	public function action_day()
	{
		$day = OrderStatictic::forDay(Param::get('day'));
		$this->view->render('statistics/day', compact('day'));
	}

	public function action_month()
	{
        $month = OrderStatictic::forDay(Param::get('mounth'));
        $this->view->render('statistics/day', compact('month'));
	}



}
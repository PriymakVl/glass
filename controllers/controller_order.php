<?php
require_once('./core/controller.php');
require_once('./models/order.php');
require_once ('./helpers/param.php');
require_once ('./helpers/letter_parse.php');
require_once ('./helpers/message.php');


class Controller_Order extends Controller {

	public function action_index()
	{
		$order = new Order(Param::get('order_id'));
		$order->convertState();
		//$order->getProgons();
        $title = 'Заказ';
		$this->view->render('order/index/main', compact('order', 'title'));
	}
	
	public function action_list()
	{
	    $params = Param::forOrderList();
        $light_id = Param::get('light_id');
		$orders = Order::getList($params);
        $title = 'Заказы';
		$this->view->render('order/list/main', compact('orders', 'params', 'title', 'light_id'));
	}

	public function action_add()
    {
        $type = Param::get('type');
        $letter = new LetterParse($type);
        debug($letter);
        $order = Order::getByNumber($letter->number);
        if ($order) {
            Message::setSession('error', 'order', 'already_exist');
            $this->redirect('order?order_id='.$order->id);
        }
        $add_id = Order::add($letter);
        Message::setSession('success', 'order', 'success_add');
        if ($type == Order::TYPE_GLASS) $this->redirect('order/list?type='.Order::TYPE_GLASS.'&light_id='.$add_id);
        else $this->redirect('order/list?light_id='.$add_id);
    }

    public function action_delete()
    {
        $ids = Param::getIds('ids');
        foreach ($ids as $id) {
            $order = new Order($id);
            $order->delete();
        }
        $this->redirect('order/list');
    }
    
    public function action_state()
    {
        $ids = Param::getIds('ids');
        foreach ($ids as $id) {
            $order = new Order($id);
            $order->setState(Param::get('state'));
        }
        $this->redirect('order/list');
    }

    //set kind preparation, problem order
    public function action_kind()
    {
        $kind = Param::get('kind');
        $ids = Param::getIds('ids');
        foreach ($ids as $id) {
            $order = new Order($id);
            $order->setKind($kind);
        }
        $this->redirect('order/list');
    }

    public function action_search()
    {
        $orders = Order::searchByNumber(Param::get('number'));
        if (empty($orders)) {
            Message::setSession('error', 'order', 'search_not_found');
            $this->redirect('order/list');
        }
        else {
            Message::setSession('success', 'order', 'search_found');
            if (count($orders) == 1) $this->redirect('order?order_id='.$orders[0]->id);
            else $this->view->render('order/search/main', compact('orders'));
        }
    }

//    public function action_type()
//    {
//        $ids = Param::getIds('ids');
//        foreach ($ids as $id) {
//            $order = new Order($id);
//            $order->setType(Param::get('type'));
//        }
//        $this->redirect('order/list');
//    }

    public function action_update()
    {
        $order = new Order(Param::get('order_id'));
        if (Param::get('update')) {
            $order->update();
            Message::setSession('success', 'order', 'update_success');
            if (Param::get('type') == Order::TYPE_GLASS) $this->redirect('order/list?type='.Param::get('type').'&light_id='.$order->id);
            $this->redirect('order/list?light_id='.$order->id);
        }
        $this->view->render('order/update/main', compact('order'));
    }
	
}
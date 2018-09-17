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
		$order->getNameState()->getProgons();
		$states = OrderState::get($order->id);
        $title = 'Заказ';
		$this->view->render('order/index/main', compact('order', 'title', 'states'));
	}

	public function action_list()
	{
	    $params = Param::forOrderList();
		$orders = Order::getList($params);
        $title = 'Заказы';
		$this->view->render('order/list/main', compact('orders', 'params', 'title'));
	}


	public function action_add()
    {
        $order = Order::getByNumber(Param::get('number'));
        if ($order) {
            Message::setSession('error', 'order', 'already_exist');
            $this->redirect('order/index?order_id='.$order->id);
        }
        else {
            $add_id = Order::add(Param::forAddOrder());
            Message::setSession('success', 'order', 'success_add');
            $this->redirect('order/list?&light_id='.$add_id.'&type='.Param::get('type'));
        }
    }

    public function action_letterparse()
    {
        $type = Param::get('type');
        $letter = new LetterParse($type);
        $data['number'] = $letter->number;
        $data['date'] = $letter->date;
        echo json_encode($data);
        exit;
    }

    public function action_delete()
    {
        $type = Param::get('type');
        $ids = Param::getIds('ids');
        foreach ($ids as $id) {
            $order = new Order($id);
            $order->delete();
        }
        Message::setSession('success', 'order', 'success_delete');
        $this->redirect('order/list?type='.$type);
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
        $type = Param::get('type');
        $ids = Param::getIds('ids');
        foreach ($ids as $id) {
            $order = new Order($id);
            $order->setKind($kind);
        }
        $this->redirect('order/list?type='.$type);
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
            if (count($orders) == 1) $this->redirect('order/index?order_id='.$orders[0]->id);
            else $this->view->render('order/search/main', compact('orders'));
        }
    }

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
    //the order is issued to work
    public function action_progon()
    {
        $ids = Param::getIds('ids');
        $type = Param::get('type');
        $kind = Param::get('kind');
        foreach ($ids as $id) {
            $order = new Order($id);
            $result = $order->setProgonsPackets();
            if (!$result) {
                Message::setSession('error', 'order', 'state_not_issued_not_progons');
                break;
            }
            $order->setState(OrderState::WORK);
        }
        if ($result) Message::setSession('success', 'order_state', 'in_work');
        if ($type) $this->redirect('order/list?type='.$type);
        else if ($kind == Order::KIND_HIGHLIGHT) $this->redirect('order/list?kind='.$kind);
    }

    public function action_highlight()
    {
        $orders = Order::getHighlightPreparation();
        $title = 'Выделенные заказы';
        $this->view->render('order/list/main', compact('orders', 'title'));
    }
	
}
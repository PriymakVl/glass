<?php
require_once('./core/model.php');
require_once ('progon.php');
require_once ('./helpers/date.php');
require_once ('./helpers/message.php');
require_once ('order_state.php');

class OrderBase extends Model
{
    public $progons;
    public $cutNum;
    public $cutLetter;
    public $bgColor;
    public $stateName;

//    const STATE_NOT_ISSUED = 1;
//    const STATE_ISSUED = 2;
//    const STATE_MADED = 3;
//    const STATE_ALL = 5;

    const KIND_NOT_EXIST = 1;
    const KIND_HIGHLIGHT = 2;
    //const KIND_LAST_ADD_ORDER = 3;
    const KIND_PROBLEM = 3;

    const TYPE_PACKET = 1; //стеклопакеты
    const TYPE_GLASS = 2; //стекло
    const TYPE_TERM = 3; //закалка давальческого стекла
    const TYPE_All = 4;

    public function convertDateExecution()
    {
        if ($this->date_exec && ctype_digit ( $this->date_exec )) $this->date_exec = date('d.m', $this->date_exec);
        return $this;
    }

    public function cutNumber()
    {
        $count = strlen($this->number);
        if($count == 9) $this->cutNum = substr($this->number, -5);
        return $this;
    }

    public function setProgonsPackets()
    {
        $temps_packet = Param::getArray('temp_packet');
        $emalits = Param::getArray('emalit');
        $packets = Param::getArray('packet');
        $temps_glass = Param::getArray('temp_glass');
        $cuts = Param::getArray('cut');
        if ($packets || $temps_glass ||  $cuts || Param::get('not-progons')) {
            if ($temps_packet) Progon::setForOrder($this->id, $temps_packet, 'temp_packet');
            if ($emalits) Progon::setForOrder($this->id, $emalits, 'emalit');
            if ($packets) Progon::setForOrder($this->id, $packets, 'packet');
            if ($temps_glass) Progon::setForOrder($this->id, $temps_glass, 'temp_glass');
            if ($cuts) Progon::setForOrder($this->id, $cuts, 'cut');
            return true;
        }
        return false;
    }

    protected static function prepareDataForCreation($letter, $params)
    {
        $data['number'] = $letter->number;
        $data['date_exec'] = Date::convertStringToTime($params['date'] ? $params['date'] : $letter->date);
        $data['count_pack'] = $letter->countPacket ? $letter->countPacket : 0;
        $data['letter'] = $letter->text;
        $data['type'] = $letter->typeOrder;
        $data['state'] = OrderState::PREPARATION;
        $data['customer'] = $letter->customer_id ? $letter->customer_id : 0;
        $data['note'] = Param::get('note-dwg') ? 'чертежи' : '';
        return $data;
    }

    public function setBgColorRow()
    {
        if ($this->kind == self::KIND_HIGHLIGHT) $this->bgColor = '#FF0';
        if ($this->kind == self::KIND_PROBLEM) $this->bgColor = '#FF7F50';
        if ($this->state == OrderState::PREPARATION && Param::get('state') == OrderState::ALL) $this->bgColor = '#0F0';
        return $this;
    }

    public function getCustomer()
    {
        if ($this->customer) $this->customer = new Customer($this->customer);
        return $this;
    }

    protected static function createArrayOrders($items)
    {
        $orders = [];
        foreach ($items as $item) {
            $order = new Order($item->id);
            $order->convertDateExecution()->cutNumber()->setBgColorRow()->getCustomer();
            $orders[] = $order;
        }
        return $orders;
    }

    public function getNameState()
    {
        $this->stateName = OrderState::getName($this->state);
        return $this;
    }

}
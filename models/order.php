<?php
require_once('./core/model.php');
require_once ('progon.php');
require_once ('./helpers/date.php');
require_once ('./helpers/message.php');

class Order extends Model {

	public $progons;
	public $cutNum;
	public $cutLetter;
	public $bgColor;
	public $convertState;

    const STATE_NOT_ISSUED = 1;
    const STATE_ISSUED = 2;
    const STATE_MADED = 3;
    const STATE_ALL = 5;

    const KIND_NOT_EXIST = 1;
    const KIND_PREPARATION = 2;
    //const KIND_LAST_ADD_ORDER = 3;
    const KIND_PROBLEM = 3;

    const TYPE_PACKET = 1; //стеклопакеты
    const TYPE_GLASS = 2; //стекло
    const TYPE_All = 3;

    public function __construct($order_id)
    {
        $this->tableName = 'orders';
        parent::__construct($order_id);
    }

    public static function getByNumber($number)
    {
        if (empty($number)) return false;
        $sql = 'SELECT * FROM `orders` WHERE `number` = ? AND `status` = '.parent::STATUS_ACTIVE;
        return self::sql($sql)->perform([$number])->find();
    }

	public static function getList($params)
	{
	    $orders = [];
	    $where = self::bildWhere($params);
        $items = self::sql('SELECT `id` FROM `orders` '.$where.' ORDER BY date_exec')->performAssoc($params)->findAll();
        if (empty($items)) return $orders;
	    foreach ($items as $item) {
	        $order = new Order($item->id);
            $order->convertDateExecution()->cutNumber()->setBgColorRow()->getCustomer();
            $orders[] = $order;
        }
        return $orders;
	}

	public function convertDateExecution()
    {
        if ($this->date_exec) $this->date_exec = date('d.m', $this->date_exec);
        return $this;
    }

    public function cutNumber()
    {
        $count = strlen($this->number);
        if($count == 9) $this->cutNum = substr($this->number, -5);
        return $this;
    }

	public function getProgons()
    {
        $this->progons = Progon::getOne($this->id);
        return $this;
    }

    public static function add($letter)
    {
        $data = self::prepareDataForCreation($letter);
        $fields = 'number, date_exec, count_pack, letter, type, state, customer, note';
        $order = self::sql('INSERT INTO orders ('.$fields.') VALUES (?, ?, ?, ?, ?, ?, ?, ?)')->perform($data);
        return $order->getLastId();
    }

    private static function prepareDataForCreation($letter)
    {
        $data[] = $letter->number;
        $data[] = Date::convertStringToTime($letter->date);
        $data[] = $letter->countPacket ? $letter->countPacket : 0;
        $data[] = $letter->text;
        $data[] = $letter->typeOrder;
        $data[] = self::STATE_NOT_ISSUED;
        $data[] = $letter->customer_id ? $letter->customer_id : 0;
        $data[] = Param::get('note-dwg') ? 'чертежи' : '';
        return $data;
    }

    public function setBgColorRow()
    {
        if ($this->kind == self::KIND_PREPARATION) $this->bgColor = '#FF0';
        if ($this->kind == self::KIND_PROBLEM) $this->bgColor = '#FF7F50';
        if ($this->state == self::STATE_ISSUED && Param::get('state') == self::STATE_ALL) $this->bgColor = '#0F0';
        return $this;
    }

    public function setKind($kind)
    {
        if ($this->kind == $kind) parent::setKind(self::KIND_NOT_EXIST);
        else parent::setKind($kind);
        return $this;
    }

    public function getCustomer()
    {
        if ($this->customer) $this->customer = new Customer($this->customer);
        return $this;
    }

    public function convertState()
    {
        switch($this->state) {
            case self::STATE_ISSUED: $this->convertState = 'Выдан в работу';
            case self::STATE_NOT_ISSUED: $this->convertState = Message::get('order', 'state_not_issued');
        }
        return $this;
    }

    public function setState($state)
    {
        if ($state == self::STATE_ISSUED) $this->setKind(self::KIND_NOT_EXIST);
        parent::setState($state);
        return $this;
    }

    public function update()
    {
        $sql = 'UPDATE `orders` SET `number` = :number, `date_exec` = :date_exec, `count_pack` = :count_pack, `note` = :note, `state` = :state,';
        $sql .= '`type` = :type, `letter` = :letter WHERE `id` = :order_id';
        $data = $this->prepareDataForUpdate();
        self::sql($sql)->performAssoc($data);
    }

    private function prepareDataForUpdate()
    {
        $params = Param::select(['number', 'date_exec', 'count_pack', 'note', 'state', 'type', 'letter', 'order_id']);
        $params['date_exec'] = Date::convertStringToTime($params['date_exec']);
        if (empty($params['count_pack'])) $params['count_pack'] = 0;
        return $params;
    }

    public static function searchByNumber($number)
    {
        $sql = 'SELECT * FROM `orders` WHERE `number` like concat("%", :number, "%") AND `status` = '.self::STATUS_ACTIVE;
        return self::sql($sql)->performAssoc(['number' => $number])->findAll();
    }
    
	
}
























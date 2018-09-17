<?php
require_once ('order_static.php');

class Order extends OrderStatic {

    public function __construct($order_id)
    {
        $this->tableName = 'orders';
        parent::__construct($order_id);
    }

	public function getProgons()
    {
        $this->progons = Progon::getForOrder($this->id);
        return $this;
    }

    public function setKind($kind)
    {
        if ($this->kind == $kind) parent::setKind(self::KIND_NOT_EXIST);
        else parent::setKind($kind);
        return $this;
    }

    public function setState($state)
    {
        if ($state != OrderState::PREPARATION) $this->setKind(self::KIND_NOT_EXIST);

        $sql = "UPDATE `orders` SET  `date_state`  = :date, `state` = :state WHERE `id` = :id";
        self::perform($sql, ['date' => time(), 'state' => $state, 'id' => $this->id]);

        OrderState::set($this->id, $state);//for show history update
        return $this;
    }

    public function update()
    {
        $state = Param::get('state');
        $date_state = time();

        if ($this->state == $state) $date_state = $this->date_state ? $this->date_state : time();
        else OrderState::set($this->id, $state);//for show history update

        $sql = "UPDATE `orders` SET `number` = :number, `date_exec` = :date_exec, `state` = :state, `date_state` =".$date_state;
        $sql .= ',`note` = :note, `type` = :type, `letter` = :letter, `count_pack` = :count_pack WHERE `id` ='.$this->id;
        self::perform($sql, Param::forUpdateOrder());
    }
    
	
}
























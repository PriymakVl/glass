<?php
require_once('./core/model.php');

class Progon extends Model {
	
	//public static $tableName = 'progons';
    const TYPE_TEMP_PACKET = 'temp_packet';
    const TYPE_EMALIT = 'emalit';
    const TYPE_PACKET = 'packet';
    const TYPE_TEMP_GLASS = 'temp_glass';
    const TYPE_CUT = 'cut';

    public function __construct($progon_id)
    {
        $this->tableName = 'progons';
        parent::__construct($progon_id);
    }

	public static function getList($params)
	{
	    $where = self::bildWhere($params);
        $progons = self::perform('SELECT * FROM progons '.$where, $params)->findAll();
        return $progons;
	}

	public static function setForOrder($order_id, $numbers, $type)
    {
        foreach ($numbers as $key => $number) {
            $params[] = $order_id;
            $params[] = $type;
            $params[] = $key;
            $params[] = $number;
            $params[] = parent::STATUS_ACTIVE;
            $sql = "INSERT INTO `progons` (order_id, type, key_arr, number, status) VALUES (?, ?, ?, ?, ?)";
            self::perform($sql, $params);
            unset($params);
        }
    }
    
    public static function getForOrder($order_id) 
    {
        $sql = 'SELECT * FROM `progons` WHERE `order_id` = ? AND `status` = ?';
        return self::perform($sql, [$order_id, parent::STATUS_ACTIVE])->fetchAll();
    }

	
}
























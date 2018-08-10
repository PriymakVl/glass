<?php
require_once('./core/model.php');

class Progon extends Model {
	
	//public static $tableName = 'progons';
	
	public static function getOne($key = 'progon_id')
	{
	    $id = Param::get($key);
		return parent::factory($id, __CLASS__, self::$tableName);
	}

	public static function sql($sql)
    {
        $order = new Progon();
        $order->sql = $sql;
        return $order;
    }

	public static function getList($params)
	{
	    $where = self::bildWhere($params);
        $progons = Progon::sql('SELECT * FROM progons '.$where)->performAssoc($params)->findAll();
        return $progons;
	}

	
}
























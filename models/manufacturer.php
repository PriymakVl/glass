<?php
require_once('./core/model.php');

class Manufacturer extends Model {
	
	public static $tableName = 'manufacturers';
	
	public static function getOne($id)
	{
		return parent::factory($id, __CLASS__, self::$tableName);
	}

	public static function getManufactrers($params)
	{
	   $manufacturers = parent::getList($params, self::$tableName);
	}
	
}
























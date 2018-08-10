<?php
require_once('./core/model.php');

class Sheet extends Model {
	
	public static $tableName = 'sheets';
	
	public $sheets;
	public $sheet;
	
	const SHEET_TYPE_FULL = 'full';
	const SHEET_TYPE_CUT = 'cut';
	
	public static function getOne($id)
	{
		return parent::factory($id, __CLASS__, self::$tableName);
	}

	public static function getList($params)
	{
	    $pdo = parent::getConnectionDatabase();
	    $sql = self::bildSelect($params, self::$tableName);
//		$sql = "SELECT * FROM `".self::$tableName."` WHERE `brand_id` = :brand_id AND `thickness` = :thickness AND `status` = :status AND `type` = :type";
		//$sql = "SELECT * FROM `".self::$tableName."` WHERE `brand_id` = :brand_id AND `status` = :status";
		$stmt = $pdo->prepare($sql);
		$params = parent::prepareParams($params);
		$stmt->execute($params);
		return $stmt->fetchAll();
	}
	
}
























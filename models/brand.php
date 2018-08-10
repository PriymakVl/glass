<?php
require_once('./core/model.php');
require_once ('manufacturer.php');

class Brand extends Model {
	
	public static $tableName = 'brands';
	public $manufacturer;
	
	public static function getOne($key = 'brand_id')
	{
	    $id = Param::get($key);
		return parent::factory($id, __CLASS__, self::$tableName);
	}

	public static function sql($sql)
    {
        $brand = new Brand();
        $brand->sql = $sql;
        return $brand;
    }

	public static function getList($params)
	{
	    $where = self::bildWhere($params);
        $brands = Brand::sql('SELECT * FROM brands '.$where.' ORDER BY man_id')->performAssoc($params)->findAll();
	    foreach ($brands as $brand) {
            $row = self::sql('SELECT alias FROM manufacturers WHERE id = ?')->perform([$brand->man_id])->find();
            $brand->manufacturer = $row->alias;
        }
        return $brands;
	}

	public function getManufacturer()
    {
        $this->manufacturer = Manufacturer::getOne($this->man_id);
        return $this;
    }
	
}
























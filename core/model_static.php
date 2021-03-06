<?php
require_once('pdo.php');

class ModelStatic extends PHPDataObject {
	
	protected static $pdo;

    const STATUS_DELETE = 0;
    const STATUS_ACTIVE = 1;

	protected static function getPDO()
    {
        if(self::$pdo === null) self::$pdo = parent::getConnectionDatabase();
        return self::$pdo;
    }

    protected static function perform($sql, $params = null)
    {
        $pdo = self::getPDO();
        if ($params) {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
        }
        else $stmt = $pdo->query($sql);
        return $stmt;
    }

    public static function getAll($tableName)
    {
        $sql = 'SELECT * FROM `'.$tableName.'` WHERE `status`='.self::STATUS_ACTIVE;
        return self::perform($sql)->fetchAll();
    }

    public static function rowCount($sql)
    {
        return self::perform($sql)->rowCount();
    }

    protected static function bildSelect($params, $table_name, $sql = null)
    {
        if ($sql) $sql = $sql.$table_name;
        else $sql = 'SELECT * FROM '.$table_name;
        $where = self::bildWhere($params);
        return $sql.$where;
    }

    protected static function bildWhere($params)
    {
        if (empty($params)) return '';
        $where = ' WHERE ';
        $keys = array_keys($params);
        foreach ($keys  as $key) {
            $where = $where.'`'.$key.'` = :'.$key.' AND ';

        }
        return rtrim($where, ' AND ');
    }

    public static function getLastId()
    {
        return self::perform("SELECT LAST_INSERT_ID()")->fetchColumn();
    }
	
}
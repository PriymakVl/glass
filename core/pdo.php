<?php
require_once('./config.php');

class PHPDataObject {
	
	protected static function getConnectionDatabase()
	{
		$host = 'localhost';
		$charset = 'utf8';
		$dbname = DB_NAME;
		
		$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
		
		//$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING];

		$options = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,//PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_PERSISTENT => true,//permanent connection to the database
		];

		return new PDO($dsn, USER, PASSWORD, $options);
	}

	protected static function prepareParams($params)
    {
        if (empty($params)) return [];
        foreach ($params as $key => $value) {
            $key = ':'.$key;
            $prepare[$key] = $value;
        }
        return $prepare;
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

    public function getLastId()
    {
        $stmt = $this->pdo->query("SELECT LAST_INSERT_ID()");
        return $stmt->fetchColumn();
    }

//    public function bildValues($values)
//    {
//        foreach ($values as $key => $value) {
//            $this->stmt->bildValue(':'.$key, $value);
//        }
//        return $this;
//    }
}
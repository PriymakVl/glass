<?php
require_once('pdo.php');

class Model extends PHPDataObject {
	
	protected $pdo;
	public $sql;
	protected $stmt;
	public $data;
	protected $tableName;

    const STATUS_DELETE = 0;
    const STATUS_ACTIVE = 1;
	
	public function __construct($id = null)
	{
		if(empty($this->pdo)) $this->pdo = parent::getConnectionDatabase();
		if ($id) $this->getData($id);
		//$this->messages = parse_ini_file('/messages.ini', true);
	}
	
	public function __set($name, $value) 
	{
		if ($this->data[$name]) $this->data[$name] = $value;
	}
 
	public function __get($name) 
	{
		if ($this->data[$name]) return $this->data[$name];
	}

    public function getData($id)
    {
        $sql = 'SELECT * FROM `'.$this->tableName.'` WHERE `id` = ? AND `status` = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id, self::STATUS_ACTIVE]);
        $this->data = $stmt->fetch(PDO::FETCH_ASSOC);
    }

	protected static function sql($sql)
    {
        $model = new Model();
        $model->sql = $sql;
        return $model;
    }

    public function perform(array $data)
    {
        $this->stmt = $this->pdo->prepare($this->sql);
        $this->stmt->execute($data);
        return $this;
    }

    public function performAssoc($data)
    {
        $this->stmt = $this->pdo->prepare($this->sql);
        $data = parent::prepareParams($data);
        $this->stmt->execute($data);
        return $this;
    }

    public function find()
    {
        return $this->stmt->fetch();
    }

    public function findAll($option = null)
    {
        return $this->stmt->fetchAll($option);
    }

    public function delete()
    {
        self::sql('UPDATE `'.$this->tableName.'` SET `status` = '.self::STATUS_DELETE.' WHERE id = ?')->perform([$this->id]);
        return $this;
    }

    public function setState($state)
    {
        self::sql('UPDATE `'.$this->tableName.'` SET `state` = ? WHERE id = ?')->perform([$state, $this->id]);
        return $this;
    }

    public function setKind($kind)
    {
        self::sql('UPDATE `'.$this->tableName.'` SET `kind` = ? WHERE id = ?')->perform([$kind, $this->id]);
        return $this;
    }

    public function setType($type)
    {
        self::sql('UPDATE `'.$this->tableName.'` SET `type` = ? WHERE id = ?')->perform([$type, $this->id]);
        return $this;
    }

    public static function getAll($tableName)
    {
        $pdo = self::getConnectionDatabase();
        $sql = 'SELECT * FROM `'.$tableName.'` WHERE `status`='.self::STATUS_ACTIVE;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
	
}
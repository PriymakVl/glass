<?php
require_once('./core/model.php');

class Customer extends Model {

    public function __construct($id)
    {
        $this->tableName = 'customers';
        parent::__construct($id);
    }

	
}
























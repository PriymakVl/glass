<?php

require_once ('./models/order.php');

class Param {

    const  STATUS_ACTIVE = 1;

    public static function get($key, $default = false)
    {
        if (empty($_REQUEST[$key])) return $default;
        return $_REQUEST[$key];
    }

    private static function getParam($params, $key, $all, $default)
    {
        if (empty($_GET[$key]) && $default) $params[$key] = $default;
        else if (isset($_GET[$key]) &&  $_GET[$key] == $all) $params;
        else  $params[$key] = $_GET[$key];
        return $params;
    }

    public static function select($keys)
    {
        $params = [];
        foreach($keys as $key)
        {
            if (isset($_REQUEST[$key])) $params[$key] = $_REQUEST[$key];
        }
        return $params;
    }

    public static function getIds($key)
    {
        if (empty($_REQUEST[$key])) exit('параметр '.$key.' не существует');
        $str = $_REQUEST[$key];
        return explode(',', rtrim($str, ','));
    }

    public static function forSheetList()
    {
        if (isset($_GET['type'])) $params['type'] = $_GET['type'];
        if (isset($_GET['brand_id'])) $params['brand_id'] = $_GET['brand_id'];
        if (isset($_GET['thickness'])) $params['thickness'] = $_GET['thickness'];
        $params['status'] = isset($_GET['status']) ? $_GET['status'] : self::STATUS_ACTIVE;
        return $params;
    }

    public static function forBrandList()
    {
        if (isset($_GET['type'])) $params['type'] = $_GET['type'];
        if (isset($_GET['man_id'])) $params['man_id'] = $_GET['man_id'];
        $params['status'] = isset($_GET['status']) ? $_GET['status'] : self::STATUS_ACTIVE;
        return $params;
    }

    public static function forOrderList()
    {
        $params = [];
        $params = self::getParam($params, 'type', Order::TYPE_All, Order::TYPE_PACKET);
        $params = self::getParam($params, 'state', Order::STATE_ALL, Order::STATE_NOT_ISSUED);
        $params['status'] = isset($_GET['status']) ? $_GET['status'] : self::STATUS_ACTIVE;
        return $params;
    }
}
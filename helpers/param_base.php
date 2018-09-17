<?php

require_once ('./models/order.php');

class ParamBase {

    const  STATUS_ACTIVE = 1;

    public static function get($key, $default = false)
    {
        if (empty($_REQUEST[$key])) return $default;
        return $_REQUEST[$key];
    }

    public static function getArray($key)
    {
        $params = [];
        if (empty($_REQUEST[$key])) return false;
        foreach ($_REQUEST[$key] as $item) {
            if (empty($item)) continue;
            $params[] = $item;
        }
        return $params;
    }

    protected static function getParam($params, $key, $all, $default)
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
}
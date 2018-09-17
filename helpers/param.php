<?php

require_once ('param_base.php');
require_once ('./models/order_state.php');

class Param extends ParamBase {

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
        $params = self::getParam($params, 'state', OrderState::ALL, Order::KIND_HIGHLIGHT);
        $params['status'] = isset($_GET['status']) ? $_GET['status'] : self::STATUS_ACTIVE;
        return $params;
    }

    public static function forAddOrder()
    {
        $params = self::select(['number', 'letter', 'type', 'note']);
        $params['count_pack'] = self::get('count_pack', 0);
        $params['state'] = OrderState::PREPARATION;
        $params['date_state'] = time();
        $params['date_exec'] = Date::convertStringToTime(self::get('date_exec'));
        return $params;
    }

    public static function forUpdateOrder()
    {
        $params = self::select(['number', 'note', 'state', 'type', 'letter']);
        $params['date_exec'] = Date::convertStringToTime(self::get('date_exec'));
        $params['count_pack'] = self::get('count_pack', 0);
        return $params;
    }
}
<?php
require_once ('./core/model.php');

class OrderStatistics extends Model {

    public static function day($day = null)
    {
        //$orders['registr'] = self::getNumberOrderRegForLastDay();
        $con = self::getCountOrdersRegForLastDay($day);
        debug($con);
    }

    private static function getCountOrdersRegForLastDay($day)
    {
        //$sql = 'SELECT * FROM `orders` WHERE `date_reg`';
        //if ($day == null) $sql .= 'BETWEEN CURDATE() - INTERVAL 1 DAY AND CURDATE() AND status ='.parent::STATUS_ACTIVE;
        //else $sql .= 'BETWEEN CURDATE() - INTERVAL 1 DAY AND CURDATE() + INTERVAL 1 AND status ='.parent::STATUS_ACTIVE;
        $sql = 'SELECT * FROM `orders` WHERE `state` ='.OrderState::PREPARATIOM;
        return self::rowCount($sql);
    }

    public static function mounth($order_id)
    {
        $sql = 'SELECT `state`, `date` FROM `orders_states` WHERE `order_id` = :order_id';
        return self::sql($sql)->perform(['order_id' => $order_id])->findAll();
    }

}
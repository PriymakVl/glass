<?php

class Date {

    public static function convertStringToTime($str)
    {
        if (empty($str)) return '';
        $str = str_replace(',', '.', $str);
        $dtime = DateTime::createFromFormat("d.m.y", $str);
        return $dtime->getTimestamp();
    }
}
<?php

class Date {

    public static function convertStringToTime($str)
    {
        if (empty($str)) return '';
        $str = str_replace(',', '.', $str);
        $dtime = DateTime::createFromFormat("d.m.y", $str);
        return $dtime->getTimestamp();
    }
    
    public static function replaceLongYearForShort($date)
    {
        $year_long = date('Y');
        $year_short = date('y');
        return str_replace($year_long, $year_short, $date);
    }
}
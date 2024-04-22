<?php

class Date
{
    public static function now()
    {
        return time();
    }

    public static function startDay($day)
    {
        return mktime(00, 00, 00, date('n'), $day);
    }

    public static function startMonth($month)
    {
        return mktime(00, 00, 00, $month);
    }

    public static function startYear()
    {
    }


    public static function currentDay()
    {
        return date('d');
    }

    public static function currentMonth()
    {
        return date('m');
    }

    public static function currentYear()
    {
        date('Y');
    }
}

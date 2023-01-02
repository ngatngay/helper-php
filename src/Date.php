<?php

namespace NgatNgay\Helper;

class Date
{
    public function now()
    {
        return time();
    }

    public function startDay($day)
    {
        return mktime(00, 00, 00, date('n'), $day);
    }

    public function startMonth($month)
    {
        return mktime(00, 00, 00, $month);
    }

    public function startYear()
    {
    }


    public function currentDay()
    {
        return date('d');
    }

    public function currentMonth()
    {
        return date('m');
    }

    public function currentYear()
    {
        date('Y');
    }
}

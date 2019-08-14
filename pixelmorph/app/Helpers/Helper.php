<?php
namespace App\Helpers;

class Helper
{

    public static function convertSetlength($time = 1, string $format = '%2d:%02d')
    {
        if (!isset($time) || $time <= 1) {
            return "NA";
        } else {
            $hours = floor($time / 60);
            $minutes = ($time % 60);
            return sprintf($format, $hours, $minutes);
        }
    }

    public static function convertRelease($date)
    {
        $month = ['', 'Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'];
        if (!isset($date) || $date == '') {
            return "NA";
        } else {
            $phpdate = strtotime($date);
            return $month[date("n", strtotime($date))] . '|' . date("y", strtotime($date));
        }
    }

}

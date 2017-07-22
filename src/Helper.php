<?php
/**
 * Created by PhpStorm.
 * User: nalcheg
 * Date: 7/22/17
 * Time: 10:59 PM
 */

namespace Nalcheg\PhpHelper;


class Helper
{

    /**
     * Convert MySQL datetime to Russian datetime, for example
     * 2017-05-29 05:48:20 converts to 29.05.2017 05:48:20
     *
     * @param $datetime
     * @return mixed
     * @throws \Exception
     */
    public static function datetimeFromMysqlToRussian($datetime)
    {
        $dateRegex = '/(19|20)\d\d[- \-.](0[1-9]|1[012])[- \-.](0[1-9]|[12][0-9]|3[01])/';
        if(!preg_match($dateRegex, $datetime)) {
            throw new \Exception('Not right input date format for ::datetimeFromMysqlToRussian');
        }

        $year = substr($datetime, 0, 4);
        $month = substr($datetime, 5, 2);
        $day = substr($datetime, 8, 2);
        $hour = substr($datetime, 11, 2);
        $minute = substr($datetime, 14, 2);
        $second = substr($datetime, 17, 2);

        $stringRussianDatetime = $day . '.' . $month . '.' . $year . ' ' . $hour . ':' . $minute . ':' . $second;

        return $stringRussianDatetime;
    }
}

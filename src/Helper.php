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
     * `2017-05-29 05:48:20` converts to `29.05.2017 05:48:20`
     *
     * @param $datetime
     * @return mixed
     * @throws \Exception
     */
    public static function datetimeFromMysqlToRussian($datetime)
    {
        $dateRegex = '/(19|20)\d\d[- \-.](0[1-9]|1[012])[- \-.](0[1-9]|[12][0-9]|3[01])/';
        if (!preg_match($dateRegex, $datetime)) {
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

    /**
     * Convert date format ddmmyy to like Mysql date, for example
     * `240316` converts to `2016-03-24`
     *
     * @param $sixDigitDate
     * @param int $yearPrefix - mayby `19` or `20`
     * @return string
     * @throws \Exception
     */
    public static function dateFromSixDigitsToMysql($sixDigitDate, $yearPrefix = 20)
    {
        if (!preg_match('/(0[1-9]|[12][0-9]|3[01])(0[1-9]|1[012])(0[1-9]|1[1-9])/', $sixDigitDate)) {
            throw new \Exception('Not right input date format for ::dateFromSixDigitsToMysql($sixDigitDate)');
        }
        if (!in_array($yearPrefix, [19, 20])) {
            throw new \Exception('Not right input date format for ::dateFromSixDigitsToMysql($yearPrefix)');
        }
        $day = substr($sixDigitDate, 0, 2);
        $month = substr($sixDigitDate, 2, 2);
        $year = $yearPrefix . substr($sixDigitDate, 4, 2);

        return $year . '-' . $month . '-' . $day;
    }

}

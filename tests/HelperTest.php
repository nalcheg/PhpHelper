<?php
/**
 * Created by PhpStorm.
 * User: nalcheg
 * Date: 7/22/17
 * Time: 11:13 PM
 */

namespace Nalcheg\PhpHelper\Tests;

use Nalcheg\PhpHelper\Helper;
use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{

    public function testDatetimeFromMysqlToRussian()
    {
        $this->assertEquals('29.05.2017 05:48:20', Helper::datetimeFromMysqlToRussian('2017-05-29 05:48:20'));
    }

    /**
     * @expectedException \Exception
     */
    public function testDatetimeFromMysqlToRussianException()
    {
        Helper::datetimeFromMysqlToRussian('2017-25-29 05:48:20');
    }

    public function testDateFromSixDigitsToMysql()
    {
        $this->assertEquals('2016-03-24', Helper::dateFromSixDigitsToMysql('240316'));
    }

    /**
     * @expectedException \Exception
     */
    public function testDateFromSixDigitsToMysqlException()
    {
        Helper::datetimeFromMysqlToRussian('451316');
    }

    public function testDateFromUsaSlashesToMysql()
    {
        $this->assertEquals('2017-08-16', Helper::dateFromUsaSlashesToMysql('08/16/2017'));
    }

    /**
     * @expectedException \Exception
     */
    public function testDateFromUsaSlashesToMysqlException()
    {
        Helper::dateFromUsaSlashesToMysql('08162017');
    }

}

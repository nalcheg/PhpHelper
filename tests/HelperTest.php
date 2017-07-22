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

}

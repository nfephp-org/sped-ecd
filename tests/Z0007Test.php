<?php

namespace NFePHP\ECD\Tests;

use NFePHP\ECD\Elements\Z0007;
use PHPUnit\Framework\TestCase;
use stdClass;

class Z0007Test extends TestCase
{
    public function testZ0007()
    {
        $std = new stdClass();
        $std->COD_ENT_REF = '01';
        $std->COD_INSCR = 'Z1234567';
        
        $b7 = new Z0007($std);
        $result = "{$b7}";
        
        $expected = '|0007|01|Z1234567|';
        $this->assertEquals($expected, $result);
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testException()
    {
        $std = new stdClass();
        $std->COD_ENT_REF = 'zzz';
        $std->COD_INSCR = 'Z1234567';
        
        $b7 = new Z0007($std);
        $result = "{$b7}";
    }
}
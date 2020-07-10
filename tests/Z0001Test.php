<?php

namespace NFePHP\ECD\Tests;

use NFePHP\ECD\Elements\Z0001;
use PHPUnit\Framework\TestCase;
use stdClass;

class Z0001Test extends TestCase
{
    public function testZ0001()
    {
        $std = new stdClass();
        $std->ind_dad = 1;
        
        $b0 = new Z0001($std);
        $result = "{$b0}";
        
        $expected = '|0001|1|';
        $this->assertEquals($expected, $result);
    }
}

<?php

namespace Nakroma\Test;

use Nakroma\Cereal;
use PHPUnit_Framework_TestCase as Testcase;

/**
 * Class CerealTest
 * @package Nakroma\Test
 */
class CerealTest extends TestCase
{
    public function testIsUnique()
    {
        $cereal1 = Cereal::generate();
        $cereal2 = Cereal::generate();

        $this->assertNotEquals($cereal1, $cereal2);
    }
}
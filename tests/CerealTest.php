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
    /**
     * Tests if two generated keys are unique
     */
    public function testIsUnique()
    {
        $cereal1 = Cereal::generate();
        $cereal2 = Cereal::generate();

        $this->assertNotEquals($cereal1, $cereal2);
    }

    /**
     * Tests if the string has the correct length
     */
    public function testCorrectLength()
    {
        $length = rand();
        $key = Cereal::generate(['length' => $length, 'delimiter' => '']);

        $this->assertEquals(strlen($key), $length);
    }
}
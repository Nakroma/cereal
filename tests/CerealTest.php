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

    /**
     * Tests if the delimiters are correct
     */
    public function testDelimiters()
    {
        $length = rand();
        $delimiterSpacing = rand(0, $length-1);
        $delimiter = '-';
        $key = Cereal::generate(['length' => $length, 'delimiter' => $delimiter, 'delimiterSpacing' => $delimiterSpacing]);

        $delimiterCount = substr_count($key, $delimiter);
        $this->assertEquals($delimiterCount, ceil(($length/$delimiterSpacing)-1));
    }

    /**
     * Tests if the key correctly shows only numbers/chars
     */
    public function testSpecificSigns()
    {
        $key1 = Cereal::generate(['numbers' => false]);
        $key2 = Cereal::generate(['chars' => false]);

        $this->assertTrue(preg_match('/\d/', $key1) === 0);
        $this->assertTrue(preg_match('[a-zA-Z]', $key2) === 0);
    }

    /**
     * Tests if the key is completely lower/upper case
     */
    public function testUppercase()
    {
        $key1 = Cereal::generate(['uppercase' => false]);
        $key2 = Cereal::generate(['uppercase' => true]);

        $this->assertEquals(strtolower($key1), $key1);
        $this->assertEquals(strtoupper($key2), $key2);
    }
}
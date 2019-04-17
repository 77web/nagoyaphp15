<?php


namespace Nagoya\Doukaku15;


use PHPUnit\Framework\TestCase;

class InputParserTest extends TestCase
{
    public function test_165()
    {
        $SUT = new InputParser();
        $this->assertEquals([1, 4, 32, 128], $SUT->parse(165));
    }
}

<?php


namespace Nagoya\Doukaku15;


use PHPUnit\Framework\TestCase;

class LineTest extends TestCase
{
    public function test_getGap_距離4以下()
    {
        $line0 = new Line(1, 0);
        $line1 = new Line(2, 1);
        $line4 = new Line(4, 4);
        $line5 = new Line(4, 5);
        $line6 = new Line(4, 6);
        $line7 = new Line(4, 7);
        $this->assertEquals(1, $line0->getGap($line1));
        $this->assertEquals(4, $line0->getGap($line4));
        $this->assertEquals(4, $line4->getGap($line0));
        $this->assertEquals(3, $line0->getGap($line5));
        $this->assertEquals(2, $line0->getGap($line6));
        $this->assertEquals(1, $line0->getGap($line7));
    }
}

<?php

declare(strict_types=1);

namespace Nagoya\Doukaku15;

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    /**
     * @var App
     */
    protected $doukaku15;

    protected function setUp() : void
    {
        $this->doukaku15 = new App;
    }

    public function testIsInstanceOfDoukaku15() : void
    {
        $actual = $this->doukaku15;
        $this->assertInstanceOf(App::class, $actual);
    }
}

<?php

declare(strict_types=1);

namespace Nagoya\Doukaku15;

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function test_functional()
    {
        $app = new App();
        $this->assertEquals("3445", $app->run("165"));
    }
}

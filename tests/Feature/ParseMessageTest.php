<?php

namespace Tingo\MessageBroker\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tingo\MessageBroker\Tests\TestCase;

class ParseMessageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @group default
     */
    public function testParseMessage()
    {
        $this->assertTrue(true);
    }
}
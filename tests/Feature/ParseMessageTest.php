<?php

namespace Tingo\MessageBrokerListener\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tingo\MessageBrokerListener\Tests\TestCase;

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
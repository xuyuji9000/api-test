<?php

use PHPUnit\Framework\TestCase;

class APITest extends TestCase
{
    public function setUp()
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => 'localhost:7001']);
    }

    public function tearDown()
    {
        $this->http = null;
    }

    /**
     * @test
     */
    public function not_exploding()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function get()
    {
        $response = $this->http->get('/api/test');

        $this->assertEquals(200, $response->getStatusCode());

        $result = json_decode($response->getBody(), true);

        $this->assertEquals($result['test'], 'api');
    }
}

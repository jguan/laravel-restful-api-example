<?php

use Mockery as m;

class MovieControllerTest extends TestCase {

    public function testIndex()
    {
        $mock = m::mock('MovieRepositoryInterface');
        $mock->shouldReceive('all')->once();

        $this->app->instance('MovieRepositoryInterface', $mock);

        $this->call('GET', '/movies');
        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testShow()
    {
        $mock = m::mock('MovieRepositoryInterface');
        $mock->shouldReceive('where')->once();

        $this->app->instance('MovieRepositoryInterface', $mock);
    }
}

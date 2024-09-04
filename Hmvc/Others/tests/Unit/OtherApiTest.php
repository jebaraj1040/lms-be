<?php

namespace Hmvc\Others\Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OtherApiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testNotification()
    {
        $formData=['department_id'=>1];
        $this->post(route('api.notification-list'), $formData)->assertStatus(200);
        // $this->assertTrue(true);
    }
}

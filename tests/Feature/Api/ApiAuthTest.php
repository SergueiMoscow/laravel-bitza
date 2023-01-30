<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Psy\Exception\ErrorException;
use Tests\TestCase;
use App\Models\User;

class ApiAuthTest extends TestCase
{
    /**
     * @expectedException     ErrorException
     * @expectedExceptionCode 99
     */    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api_login()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $response->assertSee('token');
        $content = json_decode($response->getContent());
        $api_token = $content->token;
        // Log::channel('debug')->debug("ApiAuthTest Content:\n".print_r($content, true));
        // Log::channel('debug')->debug("ApiAuthTest Token:\n".print_r($api_token, true));
        $response->assertStatus(200);

        $response = $this->get('/api/?token='.$api_token->token);
        $content = $response->getContent();
        // Log::channel('debug')->debug("TestApiAuthTest content:\p" . print_r($content, true));
        $response->assertStatus(200);
    }
    
    function test_wrong_api_login() {
        /**
        * @expectedException PHPUnit\Framework\Error\Error
        */
        //$this->expectExceptionMessageMatches('Login attempt with false token');
        $response = $this->get('/api?token=wrong_token');
        $content = $response->getContent();
        Log::channel('debug')->debug("TestApiAuthTest content:\p" . print_r($content, true));
        $this->assertStringContainsString('Login attempt with false token', $content);
    }
}

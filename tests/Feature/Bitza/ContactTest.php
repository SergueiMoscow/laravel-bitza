<?php

namespace Tests\Feature\Bitza;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/contacts');

        $response->assertStatus(200);
    }
}

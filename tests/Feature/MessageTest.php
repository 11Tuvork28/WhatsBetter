<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\message;
use App\Models\Chat;

use function PHPUnit\Framework\assertNotSame;
use function PHPUnit\Framework\assertNull;

class MessageTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // get an authenticated user
        $user = User::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'type' => 'admin',
        ];

        $response = $this->actingAs($user, 'api')
            ->postJson('/api/user', $data);
    }
    use RefreshDatabase;
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_see_all_users_messages()
    {
        $response = $this->get('/message');

        $response->assertStatus(200);
    }
    public function test_write_a_message()
    {
        Chat::factory()->create()->save();
        $response = $this->json('POST', '/message', ['sender_id' => User::first()->id, 'message' => "test", 'chat_id' => Chat::first()->id]);

        $response->assertCreated();
    }
    public function test_delete_a_message()
    {
        message::factory()->create()->save();
        $message = message::first();
        $response = $this->json('DELETE', '/message/' . $message->id);
        $response->assertStatus(200);
        assertNull(message::first());
    }
}

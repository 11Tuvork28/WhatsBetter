<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use App\Models\User;
use App\Models\chat;
use App\Models\chatMember;
use function PHPUnit\Framework\assertSame;

class chatTest extends TestCase
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

        $this->actingAs($user, 'api')
            ->postJson('/api/user', $data);
    }
    use RefreshDatabase;
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_view_chat()
    {
        $response = $this->get('/chat');
        $response->assertStatus(200);
    }
    public function test_create_chat_with_one_member()
    {
        $user = User::first();
        $response = $this->json('POST', '/chat', ['member' => '1', 'name' => "test"]);
        $chat = chat::first();
        $members = chatMember::first();
        $response->assertStatus(200);
        assertSame($chat->name, 'test');
        assertSame($members->chat_id, $chat->id);
    }
}

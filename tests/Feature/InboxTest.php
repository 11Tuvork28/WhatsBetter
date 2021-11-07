<?php

namespace Tests\Feature;

use App\Models\inbox;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertNotSame;
use function PHPUnit\Framework\assertSame;

class InboxTest extends TestCase
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
    public function test_inbox_viewable()
    {
        Inbox::factory()->count(10)->create();
        $response = $this->get('/inbox');
        $response->assertStatus(200);
    }
    public function test_inbox_creation()
    {
        $response = $this->post('/inbox');
        $inbox = Inbox::first();
        $response->assertStatus(200);
        assertNotNull($inbox->user_id, User::first()->id);
    }
    #public function test_inbox_deletion()
    #{
    #  $this->withOutExceptionHandling();
    #  Inbox::factory()->create()->save();
    # $inbox = Inbox::first();
    # $response = $this->delete('/inbox/' . $inbox->id);
    #  $response->assertStatus(200);
    #   assertNotSame($inbox->id, Inbox::first()->id);
    #}
}

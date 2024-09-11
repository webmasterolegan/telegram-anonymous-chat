<?php

namespace Tests\Feature;

use App\Enums\MessageDirectionEnum;
use App\Models\Contact;
use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessageControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_send_message_to_contact(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create();

        $response = $this->actingAs($user)
            ->postJson('/api/messages', ['contact_id' => $contact->id, 'text' => 'Test message']);

        $response->assertStatus(400)->assertJson(['status' => false]);
    }

    public function test_get_messages(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create();

        $messageFromContact = Message::create([
            'contact_id' => $contact->id,
            'text' => 'Text to service Users',
        ]);

        $messageFromUser = Message::create([
            'direction' => MessageDirectionEnum::OUTGOING,
            'user_id' => $user->id,
            'contact_id' => $contact->id,
            'text' => 'Text to contact',
        ]);

        $response = $this->actingAs($user)
            ->get('/api/messages');

        $response->assertStatus(200)->assertJsonPath('data.0.id', 2);
    }
}

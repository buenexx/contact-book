<?php

namespace Tests\Feature\Contact;

use App\Models\Contact;
use App\Models\User;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    public function test_example()
    {
        $this->withoutExceptionHandling();

        $contact = Contact::factory()->createOne();

        $user = User::factory()->createOne();
        $this->actingAs($user);

        $this->post(route('contact.update', $contact), [
            'name' => 'New Name',
            'email' => 'new@email.com',
            'phone' => '+7 (999) 999-99-99',
        ])->assertRedirect(route('contact.show', $contact));

        $contact->refresh();

        $this->assertEquals('New Name', $contact->name);
        $this->assertEquals('new@email.com', $contact->email);
        $this->assertEquals('+7 (999) 999-99-99', $contact->phone);
    }
}

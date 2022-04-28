<?php

namespace Tests\Feature\Contact;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    public function test_must_create_a_new_contact()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->createOne();
        $this->actingAs($user);

        $this->post(route('contact.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'phone' => '+55 (47) 99999-9999',
        ])->assertRedirect(route('contacts.index'));

        $this->assertDatabaseHas('contacts', [
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'phone' => '+55 (47) 99999-9999',
        ]);
    }

    public function test_name_should_be_a_string_of_size_any_greater_than_five()
    {
        $user = User::factory()->createOne();
        $this->actingAs($user);

        $this->post(route('contact.store'), [
            'name' => 'John',
            'email' => 'johndoe@email.com',
            'phone' => '+55 (47) 99999-9999',
        ])->assertSessionHasErrors('name');
    }

    public function test_phone_should_be_a_string_of_size_any_greater_than_nine()
    {
        $user = User::factory()->createOne();
        $this->actingAs($user);

        $this->post(route('contact.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'phone' => '999-999',
        ])->assertSessionHasErrors('phone');
    }

    public function test_mail_should_be_a_string_valid()
    {
        $user = User::factory()->createOne();
        $this->actingAs($user);

        $this->post(route('contact.store'), [
            'name' => 'John Doe',
            'email' => 'johndoeemail.com',
            'phone' => '+55 (47) 99999-9999',
        ])->assertSessionHasErrors('email');
    }

    public function test_contact_phone_and_mail_should_be_unique()
    {
        $this->withoutExceptionHandling();

        $contact = Contact::factory()->createOne();

        $user = User::factory()->createOne();
        $this->actingAs($user);

        $this->post(route('contact.store'), [
            'name' => $contact->name,
            'email' => 'mail@mail.mail',
            'phone' => $contact->phone,
        ])->assertSessionHasErrors('phone');

        $this->post(route('contact.store'), [
            'name' => $contact->name,
            'email' => $contact->email,
            'phone' => '+55 (47) 99999-2999',
        ])->assertSessionHasErrors('mail');
    }
}

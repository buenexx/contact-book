<?php

namespace Tests\Feature\Contact;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Create extends TestCase
{
    public function test_must_create_a_new_contact()
    {
        $this->withoutExceptionHandling();

        $this->post(route('contacts.store'), [
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
        $this->post(route('contacts.store'), [
            'name' => 'John',
            'email' => 'johndoe@email.com',
            'phone' => '+55 (47) 99999-9999',
        ])->assertSessionHasErrors('name');
    }

    public function test_phone_should_be_a_string_of_size_any_greater_than_nine()
    {
        $this->post(route('contacts.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'phone' => '999-9999',
        ])->assertSessionHasErrors('phone');
    }

    public function test_mail_should_be_a_string_valid()
    {
        $this->post(route('contacts.store'), [
            'name' => 'John Doe',
            'email' => 'johndoeemail.com',
            'phone' => '+55 (47) 99999-9999',
        ])->assertSessionHasErrors('email');
    }
}

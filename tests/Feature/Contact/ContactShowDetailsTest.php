<?php

namespace Tests\Feature\Contact;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactShowDetailsTest extends TestCase
{
    public function test_example()
    {
        $contact  = Contact::factory()->create();

        $this->get(route('contact.show', $contact))
            ->assertViewHas('contact', $contact);
    }
}

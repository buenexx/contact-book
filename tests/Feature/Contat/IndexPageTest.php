<?php

namespace Tests\Feature\Contat;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class IndexPageTest extends TestCase
{
    public function test_there_must_be_a_page_to_list_contacts()
    {
        $this->get(route('contacts.index'))
            ->assertStatus(Response::HTTP_OK);
    }
}

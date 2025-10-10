<?php

use App\Models\Contact;
use App\Models\User;
use function Pest\Laravel\assertDatabaseHas;

beforeEach(
    function () {
        $user = User::factory()->create();
        $this->actingAs($user);
    }
);

it('creates a Contact and redirect to the contact index', function () {
    $contact = Contact::factory()->raw();

    $response = $this->post(route('contacts.store'), $contact);

    assertDatabaseHas('contacts', $contact);

    $response->assertRedirect(route('contacts.index'));

});

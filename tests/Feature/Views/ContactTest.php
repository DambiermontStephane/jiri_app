<?php

use App\Models\Contact;
use App\Models\User;

beforeEach(
    function () {
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }
);

it('Displays the complete list of contacts on the contact page', function () {
    $contacts = Contact::factory(10)->for($this->user)->create();

    $response = $this->get('/contacts');

    $response->assertStatus(200);

    foreach ($contacts as $contact) {
        $response->assertSee($contact->name);
    }
});

it('Show a contact details when click', function () {
    $contact = Contact::factory()->for($this->user)->create();

    $response = $this->get('/contacts/' . $contact->id);

    $response->assertStatus(200);

    $response->assertSee($contact->name);

});

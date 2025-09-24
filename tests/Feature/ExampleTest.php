<?php

use App\Models\Contact;
use App\Models\Jiri;
use App\Models\Project;

it('creates a Contact and redirect to the contact index', function () {
    $contact = Contact::factory()->raw();

    $response = $this->post('/contacts', $contact);

    $response->assertStatus(302);
    $response->assertRedirect('/contacts');
    \Pest\Laravel\assertDatabaseHas('contacts', $contact);

});

it('creates a Project and redirect to the project index', function () {
    $project = Project::factory()->raw();

    $response = $this->post('/projects', $project);

    $response->assertStatus(302);
    $response->assertRedirect('/projects');
    \Pest\Laravel\assertDatabaseHas('projects', $project);

});

it('Displays the complete list of jiris on the jiri index page', function () {
    // Arrange
    $jiris = Jiri::factory(10)->create();
    // act
    $response = $this->get('/jiris');
    // Assert
    $response->assertStatus(200);

    foreach ($jiris as $jiri) {
        $response->assertSee($jiri->name);
    }
});

it('Displays the complete list of contacts on the contact page', function () {
    $contacts = Contact::factory(10)->create();

    $response = $this->get('/contacts');

    $response->assertStatus(200);

    foreach ($contacts as $contact) {
        $response->assertSee($contact->email);
    }
});

it('Displays the complete list of projects on the project page', function () {
    $projects = Project::factory(10)->create();

    $response = $this->get('/projects');

    $response->assertStatus(200);

    foreach ($projects as $project) {
        $response->assertSee($project->name);
    }
});

it('Show a jiri details when click', function () {
    $jiri = Jiri::factory()->create();

    $response = $this->get('/jiris/'.$jiri->id);

    $response->assertStatus(200);
    $response->assertSee($jiri->name);
});

it('Show a contact details when click', function () {
    $contact = Contact::factory()->create();

    $response = $this->get('/contacts/'.$contact->id);

    $response->assertStatus(200);

    $response->assertSee($contact->name);

});

it('Show a project details when click', function () {
    $project = Project::factory()->create();

    $response = $this->get('/projects/'.$project->id);

    $response->assertStatus(200);

    $response->assertSee($project->name);
});

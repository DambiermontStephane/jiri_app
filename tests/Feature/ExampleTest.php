<?php

use App\Models\Contact;
use App\Models\Jiri;
use App\Models\Project;

it('creates a Jiri and redirect to the jiri index', function () {
    // Arrange
    $jiri = Jiri::factory()->make()->toArray();

    // Act
    $response = $this->post('/jiris', $jiri);

    // Assert
    $response->assertStatus(302);
    $response->assertRedirect('/jiris');
    \Pest\Laravel\assertDatabaseHas('jiris', $jiri);
});

it('creates a Contact and redirect to the contact index', function () {
    $contact = Contact::factory()->make()->toArray();

    $response = $this->post('/contacts', $contact);

    $response->assertStatus(302);
    $response->assertRedirect('/contacts');
    \Pest\Laravel\assertDatabaseHas('contacts', $contact);

});

it('creates a Project and redirect to the project index', function () {
    $project = Project::factory()->make()->toArray();

    $response = $this->post('/projects', $project);

    $response->assertStatus(302);
    $response->assertRedirect('/projects');
    \Pest\Laravel\assertDatabaseHas('projects', $project);

});

it('Displays the complete list of jiris on the jiri index page', function () {
    // Arrange
    $jiris = Jiri::factory(10)->create();
    //act
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

    $response = $this->get('/jiris/' . $jiri->id);

    $response->assertStatus(200);
    $response->assertSee($jiri->name);
});

it('Show a contact details when click', function () {
    $contacts = Contact::factory()->create();

    $response = $this->get('/contacts/' . $contacts->id);

    $response->assertStatus(200);

    $response->assertSee($contacts->name);

});

it('Show a project details when click', function () {
    $project = Project::factory()->create();

    $response = $this->get('/projects/' . $project->id);

    $response->assertStatus(200);

    $response->assertSee($project->name);
});

<?php

use App\Models\Project;
use App\Models\User;

beforeEach(
    function () {
        $user = User::factory()->create();
        $this->actingAs($user);
    }
);

it('Displays the complete list of projects on the project page', function () {
    $projects = Project::factory()->create();

    $response = $this->get(route('projects.index'));

    $response->assertStatus(200);

    foreach ($projects as $project) {
        $response->assertSee($project);
    }
});

it('Show a project details when click', function () {
    $project = Project::factory()->create();

    $response = $this->get('/projects/' . $project->id);

    $response->assertStatus(200);

    $response->assertSee($project->name);
});

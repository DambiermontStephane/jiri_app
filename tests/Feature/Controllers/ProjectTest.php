<?php

use App\Models\Project;
use App\Models\User;
use function Pest\Laravel\assertDatabaseHas;

beforeEach(
    function () {
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }
);

it('creates a Project and redirect to the project index', function () {
    $project = Project::factory()->for($this->user)->make()->toArray();

    $response = $this->post(route('projects.store'), $project);

    $response->assertRedirect(route('projects.index'));
    assertDatabaseHas('projects', $project);
    $response->assertStatus(302);
});

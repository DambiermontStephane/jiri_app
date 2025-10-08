<?php

use App\Models\Jiri;
use App\Models\Project;

it('redirect to the jiri index route after the successful creation of a jiri', function () {
    // Arrange
    $jiri = Jiri::factory()->raw();
    $jiri['projects'] = Project::factory()
        ->count(3)
        ->create()
        ->pluck('id', 'id')
        ->toArray();

    // Act
    $response = $this->post(route('jiris.store'), $jiri);

    // Assert
    $response->assertStatus(302);
    $response->assertRedirect('/jiris');
});

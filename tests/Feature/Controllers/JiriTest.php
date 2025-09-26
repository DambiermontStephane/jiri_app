<?php

use App\Models\Jiri;
use App\Models\Project;
use Illuminate\Database\QueryException;
use function Pest\Laravel\assertDatabaseEmpty;
use function Pest\Laravel\assertDatabaseHas;

it('creates successfully Jiri from data providing by the request', function () {
    // Arrange
    $jiri = Jiri::factory()->raw();

    // Act
    $response = $this->post('/jiris', $jiri);

    // Assert
    assertDatabaseHas('jiris', $jiri);
});

it('fails to create a new jiri in database when there are missing date in the request',
    function () {
        // Arrange
        $jiri = Jiri::factory()->withoutName()->raw();
        // Act
        $response = $this->post(route('jiris.store'), $jiri);

        // Assert
        $response->assertInvalid('name');
        assertDatabaseEmpty('jiris');

    });

it('fails to create a new jiri in database when the name is missing in the request',
    function () {
        // Arrange
        $jiri = Jiri::factory()->withoutDate()->raw();
        // Act
        $response = $this->post(route('jiris.store'), $jiri);

        // Assert
        $response->assertInvalid('date');
        assertDatabaseEmpty('jiris');

    });

it('fails to create a new jiri in database when the date is invalid',
    function () {
        // Arrange
        $jiri = Jiri::factory()->withInvalidDate()->raw();
        // Act
        $response = $this->post(route('jiris.store'), $jiri);

        // Assert
        $response->assertInvalid('date');
        assertDatabaseEmpty('jiris');

    });

it('create a jiri with associate project', function () {
    // Arrange
    $form_data = Jiri::factory()->raw();
    $form_data['projects'] = Project::factory()
        ->count(3)
        ->create()
        ->pluck('id', 'id')
        ->toArray();
    // Act
    $response = $this->post(route('jiris.store'), $form_data);
    // Assert
    $this->assertDatabaseCount('jiris', 1);
    $this->assertDatabaseCount('homeworks', 3);
});

it('create a jiri with associate contact', function () {
    $form_data = Jiri::factory()->raw();
});

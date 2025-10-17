<?php

use App\Models\Jiri;
use App\Models\Project;
use App\Models\User;
use function Pest\Laravel\assertDatabaseEmpty;
use function Pest\Laravel\assertDatabaseHas;

beforeEach(
    function () {
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }
);

it('creates successfully Jiri from data providing by the request', function () {
    // Arrange
    $jiri = Jiri::factory()->raw();
    // Act
    $response = $this->post(route('jiris.index'), $jiri);
    // Assert
    $this->assertDatabaseHas('jiris', $jiri);
});

it('see if a connected user have is linked with a jiri', function () {
    // Arrange
    $user = User::factory()->create();
    $this->actingAs($user);
    $jiri = Jiri::factory()->raw();
    // Act
    $response = $this->post(route('jiris.store'), $jiri);
    // Assert
    expect($user->jiris)->toHaveCount(1);
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

it('create a jiri with associate project for a user', function () {
    // Arrange
    $form_data = Jiri::factory()->raw();
    $form_data['projects'] = Project::factory()
        ->for(auth()->user())
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

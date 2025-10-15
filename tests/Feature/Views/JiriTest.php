<?php

use App\Models\Jiri;
use App\Models\User;

beforeEach(
    function () {
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }
);

it('verifies that the jiri create route displays a form to create a jiri',
    function (string $locale, string $main_heading) {
        // Arrange
        App::setLocale($locale);
        // Act
        $response = $this->get(route('jiris.create'));
        // Assert
        $response->assertSee("$main_heading", false);
    })->with([
    ['fr', 'Créez un jiri'],
    ['en', 'Create a jiri'],
]);

it('Displays the complete list of jiris for a user', function () {
    // Arrange
    $jiri = Jiri::factory()->for(auth()->user())->create();
    // act
    $response = $this->get(route('jiris.index'));
    // Assert
    $response->assertStatus(200);

    $response->assertSee($jiri->name ,false);

});

it('Show a jiri details when click, for a user', function () {
    $jiri = Jiri::factory()->for(auth()->user())->create();

    $response = $this->get(route('jiris.index') . '/' . $jiri->id);

    $response->assertStatus(200);
    $response->assertSee($jiri->name);
});

<?php

use App\Models\Jiri;

it('redirect to the jiri index route after the successful creation of a jiri', function () {
    // Arrange
    $jiri = Jiri::factory()->raw();

    // Act
    $response = $this->post(route('jiris.store'), $jiri);

    // Assert
    $response->assertStatus(302);
    $response->assertRedirect('/jiris');
});

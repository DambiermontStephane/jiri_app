<?php

use App\Models\Jiri;

it('creates successfully Jiri from data providing by the request', function () {
    // Arrange
    $jiri = Jiri::factory()->raw();

    // Act
    $response = $this->post('/jiris', $jiri);

    // Assert
    \Pest\Laravel\assertDatabaseHas('jiris', $jiri);
});

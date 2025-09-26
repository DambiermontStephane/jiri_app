<?php

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

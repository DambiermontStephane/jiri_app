<?php

use App\Models\User;

it('can display the login form',
    function () {
        //act
        $response = $this->get('/login');
        //assert
        $response
            ->assertSee('Se connecter')
            ->assertSeeInOrder(['<form', 'email', 'Mot de passe', '<button', 'Se connecter']);
    }
);

it('redirect to jiri index after connection',
    function () {
        User::factory()->create(['password' => 'password', 'email' => 'test@test.com']);
        //act
        $response = $this->post(route('login.store'), ['password' => 'password', 'email' => 'test@test.com']);
        //assert
        $response->assertRedirect(route('jiris.index'));
    }
);

it('register a new account', function () {
    $user = User::factory()->raw();

    $response = $this->post(route('register.store'), $user);

    $response->assertStatus(302);
    $response->assertRedirect('jiris.index');
});


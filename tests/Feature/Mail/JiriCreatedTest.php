<?php

use App\Events\JiriCreatedEvent;
use App\Mail\JiriCreatedMail;
use App\Models\Jiri;
use App\Models\User;
use \Illuminate\Support\Facades\{Mail, Event};
use App\Listeners\SendJiriCreatedEmailListener;

it('Fires an event to queue an email to send to the author after the creation of a Jiri', function () {
    //Mail::fake();
    Event::fake();

    $user = User::factory()->create();
    $this->actingAs($user);

    $formData = Jiri::factory()->raw();

    $this->post(route('jiris.store'), $formData);
    $jiri = Jiri::first();
    Event::assertListening(
        JiriCreatedEvent::class,
        SendJiriCreatedEmailListener::class
    );
    Event::assertDispatched(JiriCreatedEvent::class);

    //Mail::assertQueued(JiriCreatedMail::class);
});

it('fills correctly the email with the values of the created Jiri', function () {
    $jiri = Jiri::factory()->for(User::factory())->create();
    $mail = new JiriCreatedMail($jiri);

    $mail->assertSeeInHtml($jiri->name);
});

it('sends the email using the configured transport layer', function () {
    $user = User::factory()->create();
    $jiri = Jiri::factory()->for($user)->create();

    Mail::to($user->email)->send(new JiriCreatedMail($jiri));
    $response = file_get_contents('http://localhost:8025/api/v1/messages');
    $message = json_decode($response, true);
    dump(env('MAIL_MAILER'));
    $this->assertNotEmpty($message['messages']);
});

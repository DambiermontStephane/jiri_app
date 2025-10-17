<?php

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Laravel\Facades\Image;
use function Pest\Laravel\assertDatabaseHas;

beforeEach(
    function () {
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }
);

it('creates a Contact and redirect to the contact index', function () {
    //$contact = Contact::factory()->raw();

    $avatar = UploadedFile::fake()->image('photo.jpg');
    \Illuminate\Support\Facades\Storage::fake('public');

    $contact = [
        'name' => 'Bruno',
        'email' => 'pruneau@gmail.be',
        'tel' => null,
        'avatar' => $avatar,
    ];

    $response = $this->post(route('contacts.store'), $contact);
    assertDatabaseHas('contacts', ['name' => 'Bruno']);
    $contact = Contact::first();
    $response->assertStatus(302);
    $image = Image::read(Storage::disk('public')->get($contact->avatar));

    expect($image->width())
        ->toBeLessThanOrEqual(300)
        ->and($image->height())
        ->toBeLessThanOrEqual(300);
    $response->assertRedirect(route('contacts.show', $contact->id));

    \Illuminate\Support\Facades\Storage::disk('public')->assertExists($contact->avatar);


});

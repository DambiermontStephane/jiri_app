<?php

use App\Enums\ContactRoles;
use App\Models\Contact;
use App\Models\Jiri;

it('It is possible to retrieve many evaluated and many evaluator from a Jiri',
    function () {
        $jiri = Jiri::factory()
            ->hasAttached(
            Contact::factory()->count(7),
            ['role' => ContactRoles::Evaluated->value]
        )
            ->hasAttached(
            Contact::factory()->count(3),
            ['role' => ContactRoles::Evaluators->value]
        )
            ->create();

        $this->assertDatabaseCount('attendances', 10);

        expect($jiri->evaluated->count())->toBe(7)
            ->and($jiri->evaluators->count())->toBe(3)
            ->and($jiri->contacts->count())->toBe(10)
            ->and($jiri->attendances->count())->toBe(10);
    });

<?php

use App\Models\Club;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\patchJson;
use function Pest\Laravel\postJson;

uses(RefreshDatabase::class);

it('should get all clubs', function () {
    Club::factory(10)->create();

    getJson('/api/clubs')
        ->assertSuccessful()
        ->assertJsonCount(10)
        ->assertJsonFragment(Club::find(4)->jsonSerialize());
});



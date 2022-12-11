<?php

use App\Models\Club;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\patchJson;
use function Pest\Laravel\postJson;

uses(RefreshDatabase::class);

it('should only get clubs user is following', function () {
    $user = Sanctum::actingAs(User::factory()->createOne(), ['*']);

    Club::factory(10)->create();
    $user->clubs()->attach(Club::find(2), ['notify' => true]);
    $user->clubs()->attach(Club::find(3), ['notify' => true]);

    getJson('/api/users/me/following')
        ->assertSuccessful()
        ->assertJsonCount(2)
        ->assertJsonFragment(Club::find(2)->jsonSerialize())
        ->assertJsonFragment(Club::find(3)->jsonSerialize())
        ->assertJsonMissing(Club::find(4)->jsonSerialize());
});



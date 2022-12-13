<?php

namespace Tests\Browser;

use App\Models\Club;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Laravel\Sanctum\Sanctum;
use Tests\DuskTestCase;

class ClubsTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected $user;

    /**
     * Test that only clubs that the user follows appear.
     *
     * @return void
     */
    public function testClubsFollowing()
    {
        $this->user = User::factory()->createOne();

        Club::factory(10)->create();

        $this->user->clubs()->attach(Club::find(2), ['notify' => true]);
        $this->user->clubs()->attach(Club::find(3), ['notify' => true]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/clubs-follow')
                ->assertSee('Following')
                ->assertSee(Club::find(2)->name)
                ->assertSee(Club::find(3)->name)
                ->assertDontSee(Club::find(1)->name)
                ->screenshot('should be logged in');
        });
    }

    /**
     * Test that clubs appear.
     *
     * @return void
     */
    public function testClubsLoggedOut()
    {
        Club::factory(10)->create();

        $this->browse(function (Browser $browser) {
            $browser->visit('/clubs-browse')
                ->assertSee('Campus')
                ->assertSee(Club::find(1)->name)
                ->assertSee(Club::find(2)->name)
                ->screenshot('should be logged out');
        });
    }
}

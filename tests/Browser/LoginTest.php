<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test login page and make sure user is successfully authenticated.
     * 
     * @return void
     */
    public function testLogin()
    {
        User::factory()->create(['email' => 'neal.patron@test.com']);

        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Not registered?')
                ->type('#input-3', 'neal.patron@test.com')
                ->type('#input-5', 'password')
                ->press('#app > div > div > main > div:nth-child(2) > div > form > button')
                ->waitForLocation('/home')
                ->assertPathIs('/home')
                ->assertAuthenticatedAs(User::all()->where('email', 'neal.patron@test.com')[0]);
        });
        
    }
}

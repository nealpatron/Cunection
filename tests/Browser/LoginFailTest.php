<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginFailTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test that unregistered user cannot login.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertEmpty(User::all()->where('email', 'neal.patron@test.com'));

        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Not registered?')
                    ->type('#input-3', 'neal.patron@test.com')
                    ->type('#input-5', 'password')
                    ->press('#app > div > div > main > div:nth-child(2) > div > form > button');
        });
    }
}

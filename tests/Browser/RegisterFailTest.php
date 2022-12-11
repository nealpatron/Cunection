<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterFailTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test that user cannot register using an email that is already registered.
     *
     * @return void
     */
    public function testExample()
    {
        User::factory()->create(['email' => 'neal.patron@test.com']);

        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Register')
                ->type('#input-3', "Neal Patron")
                ->type('#input-5', "neal.patron@test.com")
                ->type('#input-7', "password")
                ->press('#app > div > div > main > div:nth-child(2) > div > form > button')
                ->assertPathIsNot('/login');

        });
    }
}

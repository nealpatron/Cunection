<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test register form.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Register')
                ->type('#input-3', "Neal Patron")
                ->type('#input-5', "neal.patron@test.com")
                ->type('#input-7', "password")
                ->press('#app > div > div > main > div:nth-child(2) > div > form > button')
                ->waitForLocation('/login')
                ->assertPathIs('/login');
                
        
        });
    }
}

<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class RegistrationTest extends DuskTestCase
{
    use DatabaseMigrations;

    /*

    */

    public function testUserRegistration()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('email', 'someone@abc.com')
                    ->type('password', 'secret')
                    ->type('password_confirmation', 'secret')
                    ->press('Register')
                    ->assertPathIs('/home')
                ;
        });
    }
}

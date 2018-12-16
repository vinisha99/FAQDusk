<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\setup;
use App\User;

class LoginTest extends DuskTestCase
{

    use DatabaseMigrations;


    public function testUserLogin()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('email', 'someone@abc.com')
                ->type('password', 'secret')
                ->type('password_confirmation', 'secret')
                ->press('Register')
                ->assertPathIs('/home')
                ->clickLink('My Account')
                ->clickLink('Logout')
                ->clickLink('Login')
                ->type('email', 'someone@abc.com')
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/home');
        });
    }

    public function testUserLogout()
    {
        $newUser = setup::CreateUser();

        $this->browse(function (Browser $browser) use ($newUser) {
            $browser->loginAs($newUser)
                ->visit('/home')
                ->clickLink('My Account')
                ->clickLink('Logout')
                ->assertPathIs('/');
        });

    }
}

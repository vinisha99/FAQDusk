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



    public function testLoginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Register');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testUserLogin()
    {
        $newUser = $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',

        ]);

        $this->browse(function (Browser $browser) {

            $browser->loginAs(User::where(['email'=>'someone@abc.com'])->first())
                ->visit('/home')
                ->assertSee('Home');
        });
    }
}

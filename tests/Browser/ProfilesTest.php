<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Profile;

class ProfilesTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testCreateProfile()
    {
        $newUser = setup::CreateUser();

        $this->browse(function (Browser $browser) use($newUser) {
            $browser->loginAs($newUser)
                ->visit('/home')
                ->clickLink('My Account')
                ->clickLink('Create Profile')
                ->type('fname','John')
                ->type('lname','Doe')
                ->type('body', 'Profile created for Laravel Testing.')
                ->press('Save')
                ->assertSee('Profile Created');
        });

    }


    public function testViewMyProfile()
    {
        $newUser = setup::CreateUser();
        $newProfile = setup::createProfile();

        $this->browse(function (Browser $browser) use($newUser, $newProfile) {
            $browser->loginAs($newUser)
                ->visit('/home')
                ->clickLink('My Account')
                ->clickLink('My Profile')
                ->assertSee('My Profile');
        });

    }

    public function testEditMyProfile()
    {
        $newUser = setup::CreateUser();
        $newProfile = setup::createProfile();

        $this->browse(function (Browser $browser) use($newUser) {
            $browser->loginAs($newUser)
                ->visit('/home')
                ->clickLink('My Account')
                ->clickLink('My Profile')
                ->clickLink('Edit')
                ->type('body', 'Updating Body.')
                ->press('Save')
                ->assertSee('Updated Profile');
        });

    }
}

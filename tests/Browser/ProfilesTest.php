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
    public function testViewCreateProfile()
    {
        $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',

        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/home')
                ->clickLink('My Account')
                ->clickLink('Create Profile')
                ->assertPathIs('/user/1/profile');
        });

    }


    public function testCreateProfile()
    {
        $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',

        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
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
        $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',

        ]);

        $newProfile = factory(Profile::class)->create([
            'user_id' => $newUser->id,
            'fname' => 'John',
            'lname' => 'Doe',
            'body' => 'Profile created for Laravel Testing.'
        ]);


        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/home')
                ->clickLink('My Account')
                ->clickLink('My Profile')
                ->assertPathIs('/user/1/profile/1');
        });

    }

    public function testEditMyProfile()
    {
        $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',

        ]);

        $newProfile = factory(Profile::class)->create([
            'user_id' => $newUser->id,
            'fname' => 'John',
            'lname' => 'Doe',
            'body' => 'Profile created for Laravel Testing.'
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
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

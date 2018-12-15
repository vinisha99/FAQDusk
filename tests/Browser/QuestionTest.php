<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class QuestionTest extends DuskTestCase
{

    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testQuestionPage()
    {
        $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',

        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/home')
                ->assertSee('Questions');
            });
    }


    public function testCreateQuestionsButton()
    {
        $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/home')
                ->ClickLink('Create a Question')
                ->assertPathIs('/questions/create');
        });

    }


    public function testAddQuestion()
    {
        $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/questions/create')
                ->type('body', 'This is the First question')
                ->press('Save')
                ->assertPathIs('/home')
                ->assertSee('IT WORKS!');
        });

    }




}

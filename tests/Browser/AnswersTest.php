<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Question;

class AnswersTest extends DuskTestCase
{

 use DatabaseMigrations;   /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testViewNoAnswers()
    {
        $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',
        ]);

        $newQuestion = factory(Question::class)->create([
            'user_id' => User::where(['email' => 'someone@abc.com'])->first()->id,
            'body' => 'This question is created for testing'
        ]);

        $newQuestion->save();
        $questionID = '/questions/' . $newQuestion->id;

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/home')
                ->clickLink('View')
                ->assertSee('No Answers');
        });
    }


    public function testCreateAnswers()
    {
        $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',
        ]);

        $newQuestion = factory(Question::class)->create([
            'user_id' => User::where(['email' => 'someone@abc.com'])->first()->id,
            'body' => 'This question is created for testing'
        ]);

        $newQuestion->save();
        $questionID = '/questions/' . $newQuestion->id;

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/home')
                ->clickLink('View')
                ->clickLink('Answer Question')
                ->type('body','This is the answer for 1st question')
                ->press('Save')
                ->assertSee('Saved');
        });
    }

    
}

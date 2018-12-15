<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Question;
use App\Answer;

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
            'user_id' => $newUser->id,
            'body' => 'This question is created for testing'
        ]);
        $newQuestion->save();
        //$questionID = '/questions/' . $newQuestion->id;

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
            'user_id' => $newUser->id,
            'body' => 'This question is created for testing'
        ]);
        $newQuestion->save();
        $questionID = '/questions/' . $newQuestion->id;

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/questions/1')
                ->clickLink('Answer Question')
                ->type('body','This is the answer for 1st question')
                ->press('Save')
                ->assertSee('Saved');
        });
    }


    public function testViewAnswers()
    {
        $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',
        ]);

        $newQuestion = factory(Question::class)->create([
            'user_id' => $newUser->id,
            'body' => 'This question is created for testing'
        ]);
        $newQuestion->save();

        $newAnswer = factory(Answer::class)->create([
            'user_id' => $newUser->id,
            'question_id' => $newQuestion->id,
            'body' => 'This is the answer for 1st question'
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/questions/1')
                ->clickLink('View')
                ->assertPathIs('/questions/1/answers/1')
                ->press('Delete')
                ->assertSee('Delete');
        });
    }


    public function testEditAnswers()
    {
        $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',
        ]);

        $newQuestion = factory(Question::class)->create([
            'user_id' => $newUser->id,
            'body' => 'This question is created for testing'
        ]);

        $newQuestion->save();

        $newAnswer = factory(Answer::class)->create([
            'user_id' => $newUser->id,
            'question_id' => $newQuestion->id,
            'body' => 'This is the answer for 1st question'
        ]);
        //$questionID = '/questions/' . $newQuestion->id;

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/questions/1')
                ->clickLink('View')
                ->clickLink('Edit Answer')
                ->type('body','Editing the answer for 1st question')
                ->press('Save')
                ->assertSee('Updated');
        });
    }

    public function testDeleteAnswers()
    {
        $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',
        ]);

        $newQuestion = factory(Question::class)->create([
            'user_id' => $newUser->id,
            'body' => 'This question is created for testing'
        ]);
        $newQuestion->save();

        $newAnswer = factory(Answer::class)->create([
            'user_id' => $newUser->id,
            'question_id' => $newQuestion->id,
            'body' => 'This is the answer for 1st question'
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/questions/1')
                ->clickLink('View')
                ->press('Delete')
                ->assertSee('Delete');
        });
    }
}

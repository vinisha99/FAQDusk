<?php

namespace Tests\Browser;

use App\Question;
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

    //public $questionID = 0;


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
                ->clickLink('Create a Question')
                ->assertPathIs('/questions/create');
        });

    }


    public function testNoQuestions()
    {
        $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/home')
                ->assertDontSee('View');
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
                ->assertSee('IT WORKS!')
                ->assertSee('View');
        });
    }


    public function testViewQuestion()
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

        // dd($questionID);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/home')
                ->clickLink('View')
                ->assertPathIs('/questions/1')
                ->assertSee('This question is created for testing');
        });
    }




    public function testEditQuestion()
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
        /*$questionID = '/questions/'.$newQuestion->id;
        $questionID->toString();*/


        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/questions/1')
                ->clickLink('Edit Question')
                ->type('body','The first question is edited')
                ->press('Save')
                ->assertSee('Saved');

        });

    }


    public function testDeleteQuestion()
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
        /*$questionID = '/questions/'.$newQuestion->id;
        $questionID->toString();*/


        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where(['email' => 'someone@abc.com'])->first())
                ->visit('/questions/1')
                ->press('Delete')
                ->assertSee('Deleted');

        });

    }






}

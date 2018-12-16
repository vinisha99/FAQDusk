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

    public function testCreateAnswers()
    {
        $newUser = setup::CreateUser();
        $newQuestion = setup::createQuestion();

        $this->browse(function (Browser $browser) use($newUser, $newQuestion) {
            $browser->loginAs($newUser)
                ->visit('/questions/'.$newQuestion->id)
                ->clickLink('Answer Question')
                ->type('body','This is the answer for 1st question')
                ->press('Save')
                ->assertSee('Saved');
        });
    }


    public function testViewAnswers()
    {
        $newUser = setup::CreateUser();
        $newQuestion = setup::createQuestion();
        $newAnswer = setup::createAnswer();

        $this->browse(function (Browser $browser) use($newUser, $newQuestion, $newAnswer) {
            $browser->loginAs($newUser)
                ->visit('/questions/'.$newQuestion->id)
                ->clickLink('View')
                ->assertPathIs('/questions/'.$newQuestion->id.'/answers/'.$newAnswer->id)
                ->assertSee('Answer');
        });
    }


    public function testEditAnswers()
    {
        $newUser = setup::CreateUser();
        $newQuestion = setup::createQuestion();
        $newAnswer = setup::createAnswer();

        $this->browse(function (Browser $browser) use($newUser, $newQuestion) {
            $browser->loginAs($newUser)
                ->visit('/questions/'.$newQuestion->id)
                ->clickLink('View')
                ->clickLink('Edit Answer')
                ->type('body','Editing the answer for 1st question')
                ->press('Save')
                ->assertSee('Updated');
        });
    }

    public function testDeleteAnswers()
    {
        $newUser = setup::CreateUser();
        $newQuestion = setup::createQuestion();
        $newAnswer = setup::createAnswer();

        $this->browse(function (Browser $browser) use($newUser, $newQuestion) {
            $browser->loginAs($newUser)
                ->visit('/questions/'.$newQuestion->id)
                ->clickLink('View')
                ->press('Delete')
                ->assertSee('Delete');
        });
    }
}

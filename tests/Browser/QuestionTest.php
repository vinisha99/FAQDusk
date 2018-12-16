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

    public function testAddQuestion()
    {
        $newUser = setup::CreateUser();

        $this->browse(function (Browser $browser) use($newUser) {
            $browser->loginAs($newUser)
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
        $newUser = setup::CreateUser();
        $newQuestion = setup::createQuestion();

        $this->browse(function (Browser $browser) use($newUser, $newQuestion) {
            $browser->loginAs($newUser)
                ->visit('/home')
                ->clickLink('View')
                ->assertPathIs('/questions/'.$newQuestion->id)
                ->assertSee('This question is created for testing');
        });
    }



    public function testEditQuestion()
    {
        $newUser = setup::CreateUser();
        $newQuestion = setup::createQuestion();

        $this->browse(function (Browser $browser) use($newUser, $newQuestion) {
            $browser->loginAs($newUser)
                ->visit('/questions/'.$newQuestion->id)
                ->clickLink('Edit Question')
                ->type('body','The first question is edited')
                ->press('Save')
                ->assertSee('Saved');

        });

    }


    public function testDeleteQuestion()
    {
        $newUser = setup::CreateUser();
        $newQuestion = setup::createQuestion();

        $this->browse(function (Browser $browser) use($newUser, $newQuestion) {
            $browser->loginAs($newUser)
                ->visit('/questions/'.$newQuestion->id)
                ->press('Delete')
                ->assertSee('Deleted');

        });

    }

}

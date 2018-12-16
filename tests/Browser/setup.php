<?php
/**
 * Created by PhpStorm.
 * User: vinisha
 * Date: 12/14/18
 * Time: 2:58 PM
 */

namespace Tests\Browser;

use App\User;
use App\Profile;
use App\Question;
use App\Answer;


class setup
{
    static public function CreateUser()
    {
        $newUser = factory(User::class)->create([
            'email' => 'someone@abc.com',
            'password' => 'secret',
            //'password_confirmation' => 'secret'
        ]);

        return $newUser;
    }

    static public function createProfile()
    {
        $newUser = User::where(['email' => 'someone@abc.com'])->first();

        $newProfile = factory(Profile::class)->create([
            'user_id' => $newUser->id,
            'fname' => 'John',
            'lname' => 'Doe',
            'body' => 'Profile created for Laravel Testing.'
        ]);
        $newProfile->save();

        return $newProfile;
    }

    static public function createQuestion()
    {
        $newUser = User::where(['email' => 'someone@abc.com'])->first();

        $newQuestion = factory(Question::class)->create([
            'user_id' => $newUser->id,
            'body' => 'This question is created for testing'
        ]);
        $newQuestion->save();

        return $newQuestion;
    }

    static  public function createAnswer()
    {
        $newQuestion = Question::find(1)->first();

        $newAnswer = factory(Answer::class)->create([
            'user_id' => $newQuestion->user_id,
            'question_id' => $newQuestion->id,
            'body' => 'This is the answer for 1st question'
        ]);
        $newAnswer->save();

        return $newAnswer;
    }


}
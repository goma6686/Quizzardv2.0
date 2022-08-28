<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('answers')->delete();
        \DB::table('questions')->delete();

        $question1 = [
            'question_text' => 'question 1',
            'is_active' => true,
            'type_id' => 2,
            'category_id' => 1,
            'user_id' => 1,
        ];

        $answer1 = [
            'answer_text' => 'false answer',
            'is_correct' => false,
            'question_id' => 1,
        ];

        Question::create($question1); //one admin
        Answer::create($answer1);
    }
}

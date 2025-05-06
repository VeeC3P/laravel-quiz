<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add more questions here for Bored Panda if they want to or for testing purposes on my local device
        $quizData = [
            [
                'question' => 'Who is Luke Skywalker’s father?',
                'answers' => [
                    ['text' => 'Obi-Wan Kenobi', 'score' => 0],
                    ['text' => 'Darth Vader', 'score' => 1],
                    ['text' => 'Yoda', 'score' => 0],
                    ['text' => 'Han Solo', 'score' => 0],
                ],
            ],
            [
                'question' => 'What is the name of Han Solo’s ship?',
                'answers' => [
                    ['text' => 'Star Destroyer', 'score' => 0],
                    ['text' => 'X-Wing', 'score' => 0],
                    ['text' => 'Millennium Falcon', 'score' => 1],
                    ['text' => 'TIE Fighter', 'score' => 0],
                ],
            ],
            [
                'question' => 'Who trained Obi-Wan Kenobi?',
                'answers' => [
                    ['text' => 'Yoda', 'score' => 0],
                    ['text' => 'Mace Windu', 'score' => 0],
                    ['text' => 'Qui-Gon Jinn', 'score' => 1],
                    ['text' => 'Anakin Skywalker', 'score' => 0],
                ],
            ],
            [
                'question' => 'What color is Mace Windu’s lightsaber?',
                'answers' => [
                    ['text' => 'Blue', 'score' => 0],
                    ['text' => 'Green', 'score' => 0],
                    ['text' => 'Purple', 'score' => 1],
                    ['text' => 'Red', 'score' => 0],
                ],
            ],
            [
                'question' => 'What species is Chewbacca?',
                'answers' => [
                    ['text' => 'Rodian', 'score' => 0],
                    ['text' => 'Wookiee', 'score' => 1],
                    ['text' => 'Hutt', 'score' => 0],
                    ['text' => 'Ewok', 'score' => 0],
                ],
            ],
            [
                'question' => 'What is the name of Boba Fett’s ship?',
                'answers' => [
                    ['text' => 'Slave I', 'score' => 1],
                    ['text' => 'Razor Crest', 'score' => 0],
                    ['text' => 'Ghost', 'score' => 0],
                    ['text' => 'Interceptor', 'score' => 0],
                ],
            ],
            [
                'question' => 'Who was the Supreme Leader of the First Order?',
                'answers' => [
                    ['text' => 'Kylo Ren', 'score' => 0],
                    ['text' => 'Snoke', 'score' => 1],
                    ['text' => 'Palpatine', 'score' => 0],
                    ['text' => 'Hux', 'score' => 0],
                ],
            ],
            [
                'question' => 'Which planet does Rey come from?',
                'answers' => [
                    ['text' => 'Naboo', 'score' => 0],
                    ['text' => 'Jakku', 'score' => 1],
                    ['text' => 'Tatooine', 'score' => 0],
                    ['text' => 'Dagobah', 'score' => 0],
                ],
            ],
            [
                'question' => 'Who said “It’s a trap!” in Return of the Jedi?',
                'answers' => [
                    ['text' => 'Admiral Ackbar', 'score' => 1],
                    ['text' => 'Leia Organa', 'score' => 0],
                    ['text' => 'Luke Skywalker', 'score' => 0],
                    ['text' => 'Lando Calrissian', 'score' => 0],
                ],
            ],
            [
                'question' => 'What is the name of the Mandalorian’s adopted child?',
                'answers' => [
                    ['text' => 'Yaddle', 'score' => 0],
                    ['text' => 'Grogu', 'score' => 1],
                    ['text' => 'Dooku', 'score' => 0],
                    ['text' => 'Ezra', 'score' => 0],
                ],
            ],
        ];

        foreach ($quizData as $data) {
            $question = Question::create(['text' => $data['question']]);

            $answers = array_map(function ($answer) {
                return new Answer($answer);
            }, $data['answers']);

            $question->answers()->saveMany($answers);
        }
    }
}

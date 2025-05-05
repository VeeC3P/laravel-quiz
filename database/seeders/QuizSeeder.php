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
                'question' => 'What is the capital of France?',
                'answers' => [
                    ['text' => 'Berlin', 'score' => 0],
                    ['text' => 'Madrid', 'score' => 0],
                    ['text' => 'Paris', 'score' => 1],
                    ['text' => 'Rome', 'score' => 0],
                ],
            ],
            [
                'question' => 'Which planet is known as the Red Planet?',
                'answers' => [
                    ['text' => 'Earth', 'score' => 0],
                    ['text' => 'Mars', 'score' => 1],
                    ['text' => 'Jupiter', 'score' => 0],
                    ['text' => 'Saturn', 'score' => 0],
                ],
            ],
            [
                'question' => 'Who wrote "To Kill a Mockingbird"?',
                'answers' => [
                    ['text' => 'Harper Lee', 'score' => 1],
                    ['text' => 'Mark Twain', 'score' => 0],
                    ['text' => 'Ernest Hemingway', 'score' => 0],
                    ['text' => 'F. Scott Fitzgerald', 'score' => 0],
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

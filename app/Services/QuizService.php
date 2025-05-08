<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Question;

class QuizService
{
    // Lets use the database right away and map the questions for easy formating
    public function getQuestions(): array
    {
        return Question::with('answers')->get()->map(function ($question) {
            return [
                'question' => $question->text,
                'answers' => $question->answers->map(function ($answer) {
                    return [
                        'text' => $answer->text,
                        'score' => $answer->score,
                    ];
                })->toArray(),
            ];
        })->toArray();
    }

    // Lets set up the sessions when starting the quiz so that we could access questions and score when needed
    public function start(): void
    {
        $this->reset();
        Session::put('quiz_index', 0);
        Session::put('quiz_score', 0);
        Session::put('quiz_questions', $this->getQuestions());
    }

    public function currentQuestion(): ?array
    {
        $questions = Session::get('quiz_questions', []);
        $index = Session::get('quiz_index', 0);

        return $questions[$index] ?? null;
    }

    public function totalQuestions(): int
    {
        return count($this->getQuestions());
    }

    public function currentIndex(): int
    {
        return Session::get('quiz_index', 0);
    }

    public function submitAnswer(int $selectedIndex): bool
    {
        $index = Session::get('quiz_index', 0);
        $questions = Session::get('quiz_questions', []);
        $score = Session::get('quiz_score', 0);

        $selectedScore = $questions[$index]['answers'][$selectedIndex]['score'] ?? 0;

        Session::put('quiz_score', $score + $selectedScore);
        Session::put('quiz_index', $index + 1);
        // Check if the quiz is over
        if ($this->isQuizOver()) {
            // If quiz is over, get result
            return true;
        } else {
            return false;
        }
    }

    public function isQuizOver(): bool
    {
        return $this->currentIndex() >= $this->totalQuestions();
    }

    public function getResult(): array
    {
        $score = Session::get('quiz_score', 0);
        $totalQuestions = $this->totalQuestions();
    
        // Avoid division by zero
        $percentage = $totalQuestions > 0 ? ($score / $totalQuestions) * 100 : 0;
    
        $message = match (true) {
            $percentage < 40 => 'Padawan',
            $percentage < 70 => 'Jedi',
            default => 'Master',
        };
    
        return [
            'score' => $score,
            'total' => $totalQuestions,
            'percentage' => round($percentage, 2),
            'message' => $message,
        ];
    }

    public function reset(): void
    {
        Session::forget(['quiz_index', 'quiz_score', 'quiz_questions']);
    }
}

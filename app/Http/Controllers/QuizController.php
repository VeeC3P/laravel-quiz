<?php

namespace App\Http\Controllers;

use App\Services\QuizService;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function __construct(QuizService $quizService)
    {
        $this->quizService = $quizService;
    }

    public function showIntro()
    {
        return view('quiz.index', [
            'view' => 'quiz.partials.intro',
            'total' => $this->quizService->totalQuestions()
        ]);
    }

    public function startQuiz(Request $request)
    {
        $this->quizService->start();

        return redirect()->route('quiz.question');
    }

    public function showQuestion(Request $request)
    {
        $question = $this->quizService->getQuestions();
        
        if (!$question) {
            return redirect()->route('quiz.result');
        }

        return view('quiz.index', [
            'view' => 'quiz.partials.question',
            'question' => $question
        ]);
    }

    public function submitAnswer(Request $request)
    {
        $request->validate([
            'answer_index' => 'required',
        ]);

        $isFinished = $this->quizService->submitAnswer($request->input('answer_index'));
        if($isFinished){
            $result = $this->quizService->getResult();
            // Redirect to the result page with the score and result
            return redirect()->route('quiz.result')->with('result', $result);
        } else {
            // Continue to the next question if the quiz is not over
            return redirect()->route('quiz.question');
        }
    }

    public function showResult()
    {
        $result = $this->quizService->getResult();

        return view('quiz.index', [
            'view' => 'quiz.partials.result',
            'result' => $result
        ]);
    }
}

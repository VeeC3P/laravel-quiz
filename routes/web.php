<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;


Route::get('/', function () {
    return redirect()->route('quiz.intro');
});

// prototyping the paths, potentially will change it to make it more dynamic
Route::prefix('quiz')->name('quiz.')->group(function () {
    Route::get('/intro', [QuizController::class, 'showIntro'])->name('intro');
    Route::post('/start', [QuizController::class, 'startQuiz'])->name('start');
    Route::get('/question', [QuizController::class, 'showQuestion'])->name('question');
    Route::post('/answer', [QuizController::class, 'submitAnswer'])->name('answer');
    Route::get('/result', [QuizController::class, 'showResult'])->name('result');
});

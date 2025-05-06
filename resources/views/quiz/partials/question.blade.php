<style>
    /* Initial state of the quiz container */
    .quiz-container {
        opacity: 0; /* Hidden initially */
        transform: translateY(20px); /* Start slightly lower */
        transition: opacity 1s ease, transform 1s ease; /* Smooth transition for fade-in and slide-up */
    }

    /* Animation when the page loads */
    .quiz-container.fade-in {
        opacity: 1; /* Fully visible */
        transform: translateY(0); /* Move to normal position */
    }

</style>
@php
    $index = session('quiz_index', 0); // fallback to 0 if not set
    $currentQuestion = $question[$index];
    $total = count($question);
@endphp

<div class="quiz-container">
    <div class="progress mb-4">
        <div class="progress-bar" role="progressbar" style="width: {{ (($index+1)/$total)*100 }}%" aria-valuenow="{{ $index+1 }}" aria-valuemin="0" aria-valuemax="{{ $total }}"></div>
    </div>

    <h2>Question {{ $index + 1 }} of {{ $total }}</h2>

    <p class="lead mt-3">{{ $currentQuestion['question'] }}</p>

    <form method="POST" action="{{ route('quiz.answer') }}">
        @csrf

        @foreach ($currentQuestion['answers'] as $answerIndex => $answer)
            <div class="form-check my-2">
                <input class="form-check-input" type="radio" name="answer_index" id="answer{{ $answerIndex }}" value="{{ $answerIndex }}" required>
                <label class="form-check-label" for="answer{{ $answerIndex }}">
                    {{ $answer['text'] }}
                </label>
            </div>
        @endforeach

        <button type="submit" class="lightsaber-btn mt-4">Next</button>
    </form>
</div>

<script>
    window.addEventListener('load', function() {
        const quizContainer = document.querySelector('.quiz-container');
        quizContainer.classList.add('fade-in'); // Trigger the fade-in animation
    });
</script>
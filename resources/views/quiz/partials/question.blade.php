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

        <!-- Answers Grid -->
        <div class="answers-grid">
            @foreach ($currentQuestion['answers'] as $answerIndex => $answer)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer_index" id="answer{{ $answerIndex }}" value="{{ $answerIndex }}" required>
                    <label class="form-check-label" for="answer{{ $answerIndex }}">
                        {{ $answer['text'] }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="lightsaber-btn mt-4">Next</button>
    </form>
</div>

<script>
    window.addEventListener('load', function() {
        const quizContainer = document.querySelector('.quiz-container');
        quizContainer.classList.add('fade-in'); // Trigger the fade-in animation
    });
</script>

<div class="text-center">
    <h1>Welcome to the Quiz!</h1>
    <p>This quiz contains {{ $total }} questions. Ready to test your knowledge?</p>
    <form action="{{ route('quiz.start') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary btn-lg mt-4">Start Quiz</button>
    </form>
</div>

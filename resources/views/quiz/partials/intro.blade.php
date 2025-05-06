<style>
    @import url('https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap');

    .fancy-quiz {
        font-family: 'Luckiest Guy', cursive;
        font-size: 4rem;
        background: linear-gradient(45deg, #0d6efd, #4f9eff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 2px 2px 8px rgba(13, 110, 253, 0.5);
        animation: pulse 2s infinite ease-in-out;
        text-align: center;
        margin: 20px 0;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            text-shadow: 2px 2px 8px rgba(13, 110, 253, 0.5);
        }
        50% {
            transform: scale(1.05);
            text-shadow: 4px 4px 14px rgba(13, 110, 253, 0.8);
        }
    }

</style>
<div class="text-center">
    <h1 class="fancy-quiz">Welcome to the Quiz!</h1>
    <p>This quiz contains {{ $total }} questions. Ready to test your knowledge?</p>
    <form action="{{ route('quiz.start') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary btn-lg mt-4">Start Quiz</button>
    </form>
</div>

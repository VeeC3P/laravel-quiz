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
    <p>This quiz contains {{ $total }} questions about Star Wars. Ready to test your knowledge?</p>
    <img src="https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExd2V2a3JmejVpa2ZkdXg3M3Boemt1ZTZnaXVsdDd2NGk5b21nMWYzMSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/26FmQ6EOvLxp6cWyY/giphy.gif" alt="Intro Yoda, do or do not, there is no try" style="max-width: 300px; width: 100%; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);" class="my-4" />
    <form action="{{ route('quiz.start') }}" method="POST">
        @csrf
        <button type="submit" class="btn-lg mt-4 lightsaber-btn">Start Quiz</button>
    </form>
</div>
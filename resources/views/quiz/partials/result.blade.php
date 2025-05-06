<style>
    .progress-circle {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background:
            conic-gradient(#0d6efd calc(var(--percentage) * 1%), #e9ecef 0);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        font-weight: bold;
        color: #0d6efd;
        position: relative;
    }

    .progress-value {
        width: 90px;
        height: 90px;
        background-color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: inset 0 0 5px rgba(0,0,0,0.1);
    }

</style>
<div class="text-center">
    <h1>Quiz Completed!</h1>
    <p class="lead mt-3">Your score: <strong>{{ $result['score'] }}/{{ $result['total'] }}</strong></p>

    <!-- Circular Progress -->
    <div class="d-flex justify-content-center my-4">
        <div class="progress-circle" style="--percentage: {{ $result['percentage'] }}">
            <div class="progress-value">
                {{ round($result['percentage']) }}%
            </div>
        </div>
    </div>

    <p class="mt-4">{{ $result['message'] }}</p>

    <a href="{{ route('quiz.intro') }}" class="btn btn-outline-primary mt-4">Try Again</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

<script>
    window.addEventListener('load', () => {
        const duration = 2 * 1000;
        const end = Date.now() + duration;

        (function frame() {
            confetti({
                particleCount: 5,
                angle: 60,
                spread: 55,
                origin: { x: 0 }
            });
            confetti({
                particleCount: 5,
                angle: 120,
                spread: 55,
                origin: { x: 1 }
            });

            if (Date.now() < end) {
                requestAnimationFrame(frame);
            }
        })();
    });
</script>

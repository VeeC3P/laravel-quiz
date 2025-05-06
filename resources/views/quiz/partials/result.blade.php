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

@php
    $percentage = ($result['score'] / $result['total']) * 100;

    if ($percentage > 80) {
        $gif = 'https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExZ3poaWFrM2EzdGU4azNkY2x2NWZmbndyMWNtYml0YXV2eDBoZGlucSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/3o84sCIUu49AtNYkDK/giphy.gif';
    } elseif ($percentage > 50) {
        $gif = 'https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExb2JhdzZrdGxlYmhhNjBrN2V6b3B0NWZvM3dpMGhuZmxmbHhncjZicyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/l2JJLpA2wWNqJUwXC/giphy.gif';
    } else {
        $gif = 'https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExdWRqenEyZ2tqZnQ1a2ZpbDhwOGJvcnNvNWthY3FzYnlza3h0YmJ2MSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/3ornk6UHtk276vLtkY/giphy.gif';
    }

@endphp

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

    <img src="{{ $gif }}" alt="Score Result" style="max-width: 300px; width: 100%; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);" class="my-4" />

    <p class="mt-4">Rank: {{ $result['message'] }}</p>

    <a href="{{ route('quiz.intro') }}" class="btn btn-outline-primary mt-4">Try Again</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

<script>
    
    window.addEventListener('load', () => {
        const duration = 2 * 1000;
        const end = Date.now() + duration;

        const score = {{ $result['score'] }}; // Get the score from Laravel
        const total = {{ $result['total'] }}; // Get the total from Laravel
        const percentage = (score / total) * 100;

        let particleCount = 10;  // Default particle count
        let spread = 80;         // Default spread
        let angle = 60;          // Default angle

        // Adjust the confetti intensity based on the score percentage
        if (percentage >= 50) {
            // Stronger confetti for high scores
            particleCount = 30;
        } else if (percentage >= 80) {
            // Moderate confetti for mid-range scores
            particleCount = 60;
        }

        // Make a function and run it immediately on load event, immediately invoked function expression (IIFE)
        (function frame() {
            confetti({
                particleCount: particleCount,
                angle: angle,
                spread: spread,
                origin: { x: 0 }
            });
            confetti({
                particleCount: particleCount,
                angle: 120,
                spread: spread,
                origin: { x: 1 }
            });

            if (Date.now() < end) {
                requestAnimationFrame(frame);
            }
        })();
    });

</script>

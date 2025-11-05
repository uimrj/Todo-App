<style>
    .hit-btn {
        position: relative;
        overflow: hidden;
        padding: 12px 25px;
        font-size: 18px;
        font-weight: bold;
        border: none;
        outline: none;
        border-radius: 10px;
        cursor: pointer;
        background: linear-gradient(45deg, #272525ff, #5a5a5aff);
        color: white;
        transition: 0.25s;
        box-shadow: 0 0 10px black;
        animation: pulse 1.5s infinite ease-in-out;
    }

    .hit-btn:hover {
        transform: scale(1.12) rotate(-1deg);
        box-shadow: 0 0 20px #000000ff;
    }

    /* Click Ripple */
    .hit-btn:active::after {
        content: "";
        position: absolute;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.4);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        animation: ripple 0.5s ease-out;
        pointer-events: none;
        left: var(--x);
        top: var(--y);
    }

    @keyframes ripple {
        from {
            transform: translate(-50%, -50%) scale(0);
            opacity: 1;
        }

        to {
            transform: translate(-50%, -50%) scale(2);
            opacity: 0;
        }
    }

    /* Gentle pulsing animation */
    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.08);
        }
    }

</style>

<script>
    // Gets cursor position for ripple effect
    document.addEventListener('click', function(e) {
        let btn = e.target.closest('.hit-btn');
        if (!btn) return;

        let rect = btn.getBoundingClientRect();
        btn.style.setProperty('--x', e.clientX - rect.left + 'px');
        btn.style.setProperty('--y', e.clientY - rect.top + 'px');
    });

</script>

<a href="{{ route('todolist.home') }}" class="hit-btn">
    HIT_ON 🚀
</a>

@include('include.header')

<style>
    /* Full page background */
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1f1f1f, #111);
        color: #fff;
        overflow-x: hidden;
    }

    /* Center wrapper */
    .welcome-wrapper {
        height: calc(100vh - 100px);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 0 20px;
    }

    /* Main heading */
    .welcome-wrapper h1 {
        font-size: 3rem;
        font-weight: 700;
        color: #0d6efd;
        margin-bottom: 10px;
        animation: fadeInDown 1s ease forwards;
    }

    /* Subheading */
    .welcome-wrapper p {
        font-size: 1.2rem;
        color: #ccc;
        margin-bottom: 30px;
        animation: fadeInUp 1s ease forwards;
    }

    /* Buttons */
    .welcome-wrapper .btn {
        padding: 12px 30px;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
        margin: 5px;
        animation: fadeIn 1.5s ease forwards;
    }

    .btn-login {
        background-color: #0d6efd;
        border: none;
        color: #fff;
    }

    .btn-login:hover {
        background-color: #0056b3;
    }

    .btn-register {
        background-color: transparent;
        border: 2px solid #0d6efd;
        color: #0d6efd;
    }

    .btn-register:hover {
        background-color: #0d6efd;
        color: #fff;
    }

    /* Animations */
    @keyframes fadeInDown {
        0% {
            opacity: 0;
            transform: translateY(-30px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    /* Animated background shapes */
    .shape {
        position: absolute;
        border-radius: 50%;
        opacity: 0.2;
        animation: float 6s infinite ease-in-out;
    }

    .shape.one {
        width: 120px;
        height: 120px;
        background: #0d6efd;
        top: 10%;
        left: 5%;
    }

    .shape.two {
        width: 200px;
        height: 200px;
        background: #ffc107;
        top: 70%;
        left: 80%;
    }

    .shape.three {
        width: 150px;
        height: 150px;
        background: #198754;
        top: 40%;
        left: 50%;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-30px);
        }
    }

</style>

<div class="welcome-wrapper">
    <h1>Welcome to Kuku Todo App</h1>
    <p>Organize your tasks easily and efficiently. Manage your day, your way.</p>

    <a href="{{ route('todolist.login') }}" class="btn btn-login">Login</a>
    <a href="{{ route('todolist.register') }}" class="btn btn-register">Register</a>
</div>

<!-- Animated background shapes -->
<div class="shape one"></div>
<div class="shape two"></div>
<div class="shape three"></div>

<script>
    // Optionally hide flash messages
    setTimeout(function() {
        let flash = document.querySelector('.alert-success');
        if (flash) flash.style.display = 'none';
    }, 3000);

</script>

@include('include.footer')

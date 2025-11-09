@include('include.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | TODO App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1c1c1c, #2e2e2e);
            font-family: "Poppins", sans-serif;
            color: #fff;
        }

        .register-container {
            width: 400px;
            background: #1f1f1f;
            padding: 30px;
            margin: 70px auto;
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.5);
        }

        .form-control {
            background-color: #111 !important;
            color: #fff !important;
            border: 1px solid #444;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 8px rgba(13, 110, 253, 0.5);
        }

        .btn-primary {
            background: #0d6efd;
            border: none;
            transition: 0.3s;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background: #0b5ed7;
            box-shadow: 0 0 12px #0d6efd;
        }

        .login-text a {
            color: #0d6efd;
            text-decoration: none;
        }

        .login-text a:hover {
            text-decoration: underline;
        }

        h3 {
            font-weight: 600;
            letter-spacing: 1px;
        }

    </style>
</head>
<body>

    <div class="register-container">
        <h3 class="text-center mb-4">Create Account</h3>

        <!-- Show Validation Errors -->
        @if($errors->any())
        <div class="alert alert-danger py-2">
            <ul class="mb-0 small">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Register Form -->
        <form action="{{route('todolist.registerUser')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your full name">
        </div>

        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Create password">
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Re-enter password">
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-2">Register</button>
        </form>

        <!-- Login Link -->
        <p class="text-center mt-3 login-text">
            Already have an account? <a href="{{ route('todolist.login') }}">Login</a>
        </p>
    </div>

    @include('include.footer')

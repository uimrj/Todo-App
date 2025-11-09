@include('include.header')

<style>
    .login-wrapper {
        min-height: calc(100vh - 120px);
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        flex-direction: column;
    }

    .login-card {
        background: #1f1f1f;
        padding: 35px;
        border-radius: 15px;
        width: 380px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.6);
    }

    .form-control {
        background-color: #0d0d0d !important;
        border: 1px solid #444 !important;
        color: #fff !important;
    }

    .form-control:focus {
        border-color: #0d6efd !important;
        box-shadow: 0 0 10px rgba(13, 110, 253, 0.6) !important;
    }

    .btn-primary {
        border-radius: 8px;
        font-weight: 600;
    }

    .login-title {
        color: #fff;
        font-weight: 700;
    }

    .register-text a {
        text-decoration: none;
        color: #0d6efd;
        font-weight: 500;
    }

    .alert-wrapper {
        width: 380px;
        margin-bottom: 15px;
    }

</style>

<!-- Display session messages above login card -->

<div class="login-wrapper">
    @if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
    @endif
    <div class="login-card">
        <h3 class="text-center mb-4 login-title">Login</h3>

        <form action="{{ route('todolist.loginUser') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label text-white">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                @error('password')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
        </form>

        <p class="text-center mt-3 register-text">
            Don't have an account? <a href="{{ route('todolist.register') }}">Register</a>
        </p>
    </div>
</div>

<script>
    // Hide all flash messages after 3 seconds
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(flash) {
            flash.style.display = 'none';
        });
    }, 3000);

</script>

@include('include.footer')

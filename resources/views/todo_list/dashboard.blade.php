@include('include.header')

<style>
    .dashboard-container {
        padding-top: 100px;
    }

    .dashboard-logo {
        width: 90px;
        height: 90px;
        object-fit: contain;
        filter: drop-shadow(0 0 8px rgba(255, 255, 255, 0.3));
    }

    .welcome-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #fff;
    }

    .sub-text {
        color: #bbb;
    }

    .card-custom {
        background: #1a1a1a;
        border-radius: 15px;
        padding: 25px;
        transition: 0.3s;
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .card-custom:hover {
        transform: translateY(-5px);
        background: #222;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.7);
    }

    .card-custom i {
        font-size: 34px;
        margin-bottom: 8px;
        color: #4f8cff;
    }

    .stat-number {
        font-size: 1.6rem;
        font-weight: 700;
        color: #fff;
    }

    .quick-btn {
        width: 100%;
        padding: 12px;
        font-weight: 600;
        border-radius: 10px;
    }

    .activity-list {
        background: #111;
        border-radius: 15px;
        padding: 20px;
        border: 1px solid rgba(255, 255, 255, 0.05);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
    }

    .activity-item {
        padding: 12px;
        border-bottom: 1px solid #333;
        color: #ddd;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

</style>

<div class="container dashboard-container">


    <div class="text-center mb-4">
        <img src="{{ asset('image/logo.png') }}" class="dashboard-logo" alt="App Logo">
        <h2 class="welcome-title mt-3">Welcome to My TODO Dashboard</h2>
        <p class="sub-text">Manage your daily tasks, track progress, and stay organized.</p>
    </div>



    <div class="row g-4 mt-3 justify-content-center">

        <div class="col-md-4">
            <div class="card-custom text-center">
                <i class="fa-solid fa-list-check"></i>
                <h4 class="stat-number">{{ $totalTasks }}</h4>

                    <p class="text-muted">Total Tasks</p>
            </div>
        </div>

    </div>




    <div class="row mt-5">

        <div class="col-md-6">
            <button class="btn btn-primary quick-btn" onclick="window.location='{{ route('todolist.add') }}'">
                <i class="fa-solid fa-plus me-2"></i> Add New Task
            </button>
        </div>

        <div class="col-md-6">
            <button class="btn btn-warning quick-btn" onclick="window.location='{{ route('todolist.home') }}'">
                <i class="fa-solid fa-list me-2"></i> View All Tasks
            </button>
        </div>

    </div>

    @include('include.footer')

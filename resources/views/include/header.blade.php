<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/47.2.0/ckeditor5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">




    <title>TODO List</title>

    <style>
        /* Navbar Enhancements */
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
        }

        .nav-link {
            transition: 0.3s;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #ffc107 !important;
            transform: translateY(-2px);
        }

        .nav-link.active {
            color: #ffc107 !important;
        }

        /* Background Gradient */
        body {
            background: linear-gradient(to right, #1f1f1f, #343a40);
            color: white;
            min-height: 100vh;
        }

        body {
            background: linear-gradient(135deg, #1c1c1c, #2e2e2e);
            color: #fff;
            min-height: 100vh;
        }

        /* Card Dark Mode */
        .card {
            background: #2b2b2b;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.5);
        }

        /* Input Fields */
        .form-control {
            background-color: #1f1f1f !important;
            color: #fff !important;
            border: 1px solid #555 !important;
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #0d6efd !important;
            box-shadow: 0 0 8px rgba(13, 110, 253, 0.6);
        }

        /* Labels */
        .form-label {
            color: #ddd;
        }

        /* Button */
        .btn-primary {
            background: #0d6efd;
            border: none;
            border-radius: 8px;
            transition: 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background: #0b5ed7;
            box-shadow: 0 0 12px #0d6efd;
            transform: scale(1.03);
        }

        h4 {
            color: #fff;
            font-weight: 600;
            letter-spacing: 1px;
        }

        body {
            background-color: #0d0d0d;
            color: #e6e6e6;
            font-family: "Poppins", sans-serif;
        }

        .about-card {
            background: #1a1a1a;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
        }

        .icon-box {
            background: #111;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: 0.3s;
        }

        .icon-box:hover {
            background: #222;
            transform: translateY(-5px);
        }

        .icon-box i {
            font-size: 2.8rem;
            color: #4f8cff;
            margin-bottom: 10px;
        }

        .profile-icon {
            font-size: 5rem;
            color: #4f8cff;
        }

        .status-badge {
            display: inline-block;
            width: 90px;
            /* set any width you want */
            text-align: center;
            padding: 8px 0;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">

                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo" style="height: 70px; width: 70px; object-fit: contain; margin-right: 15px; 
                border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.5);">
                    <span style="font-size: 1.8rem; font-weight: 700; color: #ffc107; letter-spacing: 1px;">
                        KUKU TODO
                    </span>
                </a>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('todolist.welcome') ? 'active' : '' }}" href="{{ route('todolist.welcome') }}">
                                Welcome
                            </a>
                        </li>
                        @endguest

                        @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('todolist.dashboard') ? 'active' : '' }}" href="{{ route('todolist.dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                        @endauth

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('todolist.gallery') ? 'active' : '' }}" href="{{ route('todolist.gallery') }}">
                                Gallery
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('todolist.about') ? 'active' : '' }}" href="{{ route('todolist.about') }}">
                                About us
                            </a>
                        </li>


                    </ul>


                    <ul class="navbar-nav ms-auto">
                        @auth
                        <li class="nav-item">
                            <form action="{{ route('todolist.logout') }}" method="POST" class="d-flex">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm px-3">Logout</button>
                            </form>
                        </li>
                        @else
                        <li class="nav-item me-2">
                            <a href="{{ route('todolist.login') }}" class="btn btn-outline-light btn-sm px-3">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('todolist.register') }}" class="btn btn-warning btn-sm px-3">Register</a>
                        </li>
                        @endauth
                    </ul>

                </div>
            </div>
        </nav>
    </header>

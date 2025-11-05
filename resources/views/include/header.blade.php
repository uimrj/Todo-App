<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

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

    </style>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">TODO LIST</a>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('todolist.home')}}">Home</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('todolist.add')}}">ADD NOTE</a>
                        </li>


                    </ul>
                </div>



                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


            </div>
        </nav>
    </header>

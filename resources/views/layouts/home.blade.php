<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            height: 100%;
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #004d00;
            padding-top: 20px;
            transition: width 0.3s;
        }
        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar a:hover {
            background-color: #006600;
            color: #f1f1f1;
        }
        .sidebar a.active {
            background-color: #005500;
            color: white;
        }
        .sidebar h2 {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }
        .content {
            margin-left: 240px;
            padding: 20px;
            background-color: #f9f9f9;
            min-height: 100vh; /* Ensure content takes full height */
        }
        .navbar {
            background-color: #004d00;
            color: white;
            padding: 10px 20px;
            margin-bottom: 20px;
        }
        .navbar h1 {
            margin: 0;
            font-size: 24px;
        }
        .container-fluid {
            padding: 0 15px;
        }
        /* Responsive design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .sidebar a {
                float: left;
            }
            .content {
                margin-left: 0;
            }
        }
        @media (max-width: 480px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>E-LIBRARY</h2>
   {{--<a href="{{ route('displayBooks') }}" class="{{ Request::routeIs('displayBooks') ? 'active' : '' }}">Dashboard</a>--}}
    <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">Books</a>
    <a href="{{ route('mainborrow') }}" class="{{ Request::routeIs('mainborrow') ? 'active' : '' }}">Borrow/Return</a>
    <form action="{{ route('logout') }}" method="POST" style="margin: 20px;">
    @csrf
    <button type="submit" class="btn btn-light text-dark border w-100">Logout</button>
</form>
</div>



<div class="content">
    @yield('content')  <!-- This will display content from child views -->
</div>
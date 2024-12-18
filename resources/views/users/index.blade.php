<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        body.dark-mode {
            background-color: #2c3e50;
            color: #ecf0f1;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        h1 {
            font-size: 36px;
            color: #2c3e50;
            margin-bottom: 40px;
            font-weight: 600;
        }
        body.dark-mode h1 {
            color: #ecf0f1;
        }
        .cards-wrapper {
            display: flex;
            justify-content: center;
            gap: 30px;
            width: 100%;
        }
        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            padding: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        body.dark-mode .card {
            background-color: #34495e;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        .card a {
            display: block;
            margin: 20px 0;
            padding: 12px;
            background-color: #1abc9c;
            color: #fff;
            font-size: 16px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        body.dark-mode .card a {
            background-color: #16a085;
        }
        .card a:hover {
            background-color: #16a085;
        }
        body.dark-mode .card a:hover {
            background-color: #1abc9c;
        }
        .card h2 {
            font-size: 22px;
            color: #34495e;
            margin-bottom: 20px;
        }
        body.dark-mode .card h2 {
            color: #ecf0f1;
        }
        .footer {
            position: fixed;
            left: 50%;
            bottom: 20px;
            transform: translateX(-50%);
            text-align: center;
            color: #7f8c8d;
        }
        body.dark-mode .footer {
            color: #95a5a6;
        }
        .toggle-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #34495e;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .toggle-btn:hover {
            background-color: #1abc9c;
        }
        /* Hamburger menu styles */
        .hamburger-menu {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: transparent;
            border: none;
            font-size: 30px;
            cursor: pointer;
            color: #34495e;
        }
        .hamburger-menu i {
            color: #34495e;
        }
        .menu {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #34495e;
            color: #fff;
            width: 200px;
            height: 100vh;
            padding: 20px;
            flex-direction: column;
            gap: 20px;
        }
        .menu a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
        }
        .menu a:hover {
            color: #1abc9c;
        }
        .profile-btn {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #16a085;
            border-radius: 4px;
            color: #fff;
            margin-bottom: 30px;
            text-decoration: none;
        }
        .profile-btn img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }
        .profile-btn span {
            font-size: 18px;
            font-weight: 600;
        }
        .menu.open {
            display: flex;
        }
    </style>
</head>
<body>

<!-- Hamburger menu button -->
<button class="hamburger-menu" onclick="toggleMenu()">
    <i class="fas fa-bars"></i>
</button>

<!-- Side menu -->
<div class="menu" id="menu">
    <div class="profile-btn">
        <img src="https://via.placeholder.com/40" alt="Profile Icon"> <!-- Profile icon -->
        <span>{{ Auth::user()->username }}</span>
    </div>
    <a href="#" onclick="toggleMode()">Dark Mode</a>
    <a href="{{ route('logout') }}">Logout</a>
</div>

<!-- Main content -->
<div class="container">
    <h1>MASTER LINK</h1>

    <div class="cards-wrapper">
        <div class="card">
            <h2>View Projects</h2>
            <a href="{{ route('users.home') }}">List</a>
        </div>
        <div class="card">
            <h2>Upload Files</h2>
            <a href="{{ route('projects.create') }}">Upload Project Files</a>
        </div>
        <div class="card"> 
            <h2>List All View</h2>
            <a href="{{ route('users.list') }}">List Data</a>
        </div>
    </div>
</div>

<div class="footer">
    <p>&copy; 2024 CRM.</p>
</div>

<script>
    function toggleMode() {
        document.body.classList.toggle('dark-mode');
    }

    function toggleMenu() {
        document.getElementById('menu').classList.toggle('open');
    }
</script>

</body>
</html>

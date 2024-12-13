<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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
            position: absolute;
            bottom: 20px;
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
    </style>
</head>
<body>

<button class="toggle-btn" onclick="toggleMode()">Dark Mode</button>

<div class="container">
    <h1>MASTER LINK</h1>

    <div class="cards-wrapper">
        <div class="card">
            <h2>View Projects</h2>
            <!-- Menggunakan route untuk mengarahkan ke users.index -->
            <a href="{{ route('users.home') }}">View All Projects</a>
        </div>
        
        <div class="card">
            <h2>Upload Files</h2>
            <!-- Menggunakan route untuk mengarahkan ke users.create -->
            <a href="{{ route('projects.create') }}">Upload Project Files</a>
        </div>
    </div>
</div>

<div class="footer">
    <p>&copy; 2024 Project Management. All rights reserved.</p>
</div>

<script>
    function toggleMode() {
        document.body.classList.toggle('dark-mode');
    }
</script>

</body>
</html>

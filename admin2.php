<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PERUNGUDI LIBRARY</title>
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('https://img.freepik.com/premium-photo/library-filled-with-rows-neatly-organized-books-shelves_992134-75.jpg') no-repeat center center/cover;
            height: 100vh;
        }

        /* Navigation Bar */
        nav {
            background: turquoise;
            padding: 15px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        .logo h1 {
            color: white;
            font-size: 30px;
            font-weight: bold;
            margin: 0;
            text-transform: uppercase;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 60px;
            margin-right: 15px;
            border-radius: 50%;
            border: 2px solid white;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            padding: 12px 15px;
            display: inline-block;
            transition: all 0.3s ease-in-out;
            font-weight: bold;
        }

        nav ul li a:hover {
            color: #ffcc00;
        }

        /* Footer */
        footer {
            background-color: black;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 75px;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav>
        <div class="logo">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKg-nEALOuKDeV2HV_Lb7CPbJgQix2MN65Li_-AUhHtw&s" alt="Books Speak Logo">
            <h1>Books Hub</h1>
        </div>
        <ul>
            <li><a href="books_perungudi.php">PERUNGUDI</a></li>
            <li><a href="#">Feedback</a></li>
            <li><a href="adminlogin.php">Logout</a></li>
            
        </ul>
    </nav>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Library Management System.</p>
        <p>All Rights Reserved.</p>
    </footer>

</body>
</html>
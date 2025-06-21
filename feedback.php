<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Feedback</title>
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('https://img.freepik.com/premium-photo/library-filled-with-rows-neatly-organized-books-shelves_992134-75.jpg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
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
            font-size: 40px;
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

        /* Feedback Form */
        .feedback-container {
            max-width: 450px;
            width: 90%;
            padding: 30px;
            background: rgba(255, 255, 255, 0.2); /* Semi-transparent */
            backdrop-filter: blur(10px); /* Glass effect */
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);

            /* Positioning */
            position: absolute;
            bottom: 70px;
            left: 50%;
            transform: translateX(-50%) scale(0.9);
            opacity: 0;
            animation: fadeIn 0.8s forwards;
        }

        @keyframes fadeIn {
            100% {
                transform: translateX(-50%) scale(1);
                opacity: 1;
            }
        }

        /* Hover Effect */
        .feedback-container:hover {
            transform: translateX(-50%) scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
        }

        h2 {
            color: white;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .input-group {
            position: relative;
            width: 100%;
            margin-bottom: 15px;
        }

        .input-group input,
        .input-group textarea {
            width: 100%;
            padding: 12px 10px 10px 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(5px);
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
            outline: none;
        }

        .input-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .input-group i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: gray;
        }

        button {
            background: linear-gradient(135deg, #28a745, #218838);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background 0.3s ease-in-out, transform 0.2s;
        }

        button:hover {
            background: linear-gradient(135deg, #218838, #1c7a33);
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            background-color: black;
            color: white;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 150%;
            font-size: 14px;
        }
    </style>
    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="logo">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKg-nEALOuKDeV2HV_Lb7CPbJgQix2MN65Li_-AUhHtw&s" alt="Books Speak Logo">
            <h1>B</h1><h1 style="color: darkgoldenrod;">OO</h1><h1>KS H</h1><h1 style="color: darkgoldenrod;">U</h1><h1>B</h1>

        </div>
    </nav>
    
    <!-- Feedback Form -->
    <div class="feedback-container">
        <h2>📖 Library Feedback Form</h2>
        <form action="submit_feedback.php" method="post">
            <div class="input-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" minlength="3" required>
                <i class="fas fa-user"></i>
            </div>

            <div class="input-group">
                <label for="mobileno">Your Mobile Number</label>
                <input type="tel" id="mobileno" name="mobileno" placeholder="Your Mobile Number" pattern="[0-9]{10}" required>
                <i class="fas fa-phone"></i>
            </div>

            <div class="input-group">
                <label for="feedback">Your Feedback</label>
                <textarea id="feedback" name="feedback" placeholder="Your Feedback" minlength="10" required></textarea>
                <i class="fas fa-comment"></i>
            </div>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Library Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>

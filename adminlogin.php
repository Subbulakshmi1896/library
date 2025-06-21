<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN LOGIN</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('https://img.freepik.com/premium-photo/library-filled-with-rows-neatly-organized-books-shelves_992134-75.jpg') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        nav {
            background: turquoise;
            padding: 15px 15px;
            position: fixed;
            width: 100%;
            height: 8%;
            top: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
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
        .logo h1 {
            color: black;
            font-size: 45px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }

        .forgot-password {
            display: block;
            margin-top: 10px;
            color: black;
            text-decoration: none;
            font-size: 14px;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.2);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            backdrop-filter: blur(15px);
            margin-top: 100px;
            max-width: 350px;
        }
        h2 {
            color: #fff;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }
        input:focus {
            box-shadow: 0px 0px 8px rgba(255, 204, 0, 0.7);
        }
        .btn {
            background: linear-gradient(145deg, #4CAF50, #2E8B57);
            color: white;
            border: none;
            padding: 15px 50px;
            font-size: 18px;
            cursor: pointer;
            text-transform: uppercase;
            border-radius: 50px;
            transition: all 0.4s ease-in-out;
        }
        .btn:hover {
            background: linear-gradient(145deg, #2E8B57, #4CAF50);
            transform: scale(1.1);
        }
        .back-btn {
            background: #ff4d4d; /* Red color */
        }
        .back-btn:hover {
            background: #ff3333;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKg-nEALOuKDeV2HV_Lb7CPbJgQix2MN65Li_-AUhHtw&s" alt="Books Speak Logo">
            <h1>B</h1><h1 style="color: darkgoldenrod;">OO</h1><h1>K</h1><h1>S H</h1><h1 style="color: darkgoldenrod;">U</h1><h1>B</h1>
        </div>
    </nav>
    <div class="login-container">
        <h2>Admin Login</h2>
        <input type="text" id="Username" placeholder="Username" required>
        <input type="password" id="Password" placeholder="Password" required>
        <a href="#" class="forgot-password">Forgot Password?</a><br><br>
        <button class="btn" onclick="loginAdmin()">Login</button>
        <button class="btn back-btn" onclick="goBack()">Back</button>

        
    </div>
    <script>
        function loginAdmin() {
            let username = document.getElementById("Username").value.trim();
            let password = document.getElementById("Password").value.trim();

            // Admin Credentials
            const adminCredentials = {
                "admin1": "password1",
                "admin2": "password2",
                "admin3": "password3"
            };

            // Check login
            if (adminCredentials[username] && adminCredentials[username] === password) {
                if (username === "admin1") {
                    window.location.href = "admin1.php";
                } else if (username === "admin2") {
                    window.location.href = "admin2.php";
                } else if (username === "admin3") {
                    window.location.href = "admin3.php";
                }
            } else {
                alert("Invalid credentials. Please try again.");
            }
        }
        function goBack() {
        window.location.href = "index.html"; // Redirects to index.html
    }
    </script>
    

</body>
</html>
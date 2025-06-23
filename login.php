<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #121212; /* Dark background */
            font-family: Arial, sans-serif;
            color: #fff;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: stretch; /* Ensure inputs are full width */
            justify-content: center;
            background: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
            width: 100%;
            max-width: 400px; /* Constrain width */
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffc107;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #444;
            border-radius: 4px;
            background: #333;
            color: #fff;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #ffc107;
            border: none;
            padding: 10px;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            border-radius: 4px;
            text-transform: uppercase;
        }
        input[type="submit"]:hover {
            background-color: #e0a800;
        }
        p {
            text-align: center;
            margin-top: 10px;
        }
        a {
            color: #ffc107;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login_action.php" method="post">
            <label for="email">Email:</label>
            <input type="text" class="form-control" placeholder="Email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            
            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
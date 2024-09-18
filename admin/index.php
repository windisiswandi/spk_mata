<?php session_start(); 
if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] != "admin") {
        header("Location: ../index.php");
    }else {
        header("Location: haladmin.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .login-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }

    .login-container h2 {
        margin-bottom: 20px;
        color: #333;
    }

    .login-container label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #666;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .login-container input[type="submit"],
    .login-container input[type="reset"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        margin-right: 10px;
    }

    .login-container input[type="submit"]:hover,
    .login-container input[type="reset"]:hover {
        background-color: #0056b3;
    }

    .login-container a {
        color: #007bff;
        text-decoration: none;
        font-size: 14px;
    }

    .login-container a:hover {
        text-decoration: underline;
    }
    </style>
    <script>
    function validateForm(event) {
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();
        if (!username) {
            alert('Please enter your username.');
            event.preventDefault();
            return false;
        }
        if (!password) {
            alert('Please enter your password.');
            event.preventDefault();
            return false;
        }
        return true;
    }

    function focusUsername() {
        document.getElementById('username').focus();
    }
    </script>
</head>

<body onload="focusUsername();">
    <div class="login-container">
        <h2>Admin Login</h2>
        <form method="post" action="cekpswd.php" onsubmit="return validateForm(event);">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">

            <input type="submit" value="Login">
            <input type="reset" value="Reset">
        </form>
        <p><a href="../index.php">Back to Home</a></p>
    </div>
</body>

</html>
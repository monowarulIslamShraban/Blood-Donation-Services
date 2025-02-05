<?php
    session_start();
    
    // Checks if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $conn =  mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");
        
        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "SELECT username, pass FROM user_list WHERE username = ?";
        
        $stmt = $conn->prepare($sql);
        
        $stmt->bind_param("s", $username);
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['pass'])) {
            
            session_regenerate_id(true);
            
            $_SESSION['username'] = $username;
            $conn->close();
            header("Location: user_web_view.php");
            
            exit();
        }
        else 
        {
            $conn->close();
            
            $error_message = "Invalid username or password";
        }
    }

    if (isset($error_message)) {
        echo "<script> alert('" . $error_message . "'); window.history.back(); </script>";
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">

    <script> window.history.forward(); </script>

</head>

<body>
    <div class="login-container">
        <form class="login-form" method='post'>
            <h2 class="login"> <span id="L">L</span>ogin</h2>
            <div class="inp">
                <div>
                    <label for="username"><strong>Username:</strong>
                        <input name="username" id="username" type="text" placeholder="Username" class="input-field" required>
                    </label>

                </div>
                <div>

                    <label for="password"><strong>Password:</strong>
                        <input name="password" type="password" id="password" placeholder="Password" class="input-field" required>
                    </label>
                </div>
                <p class="forgot-password"><a href="forgotten_password.php">Forgot Password?</a></p>
                <button name='submit' type="submit" class="login-button">Login</button>
            </div>
        </form>
    </div>
</body>

</html>
<?php
    session_start();

    // Checks if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $admin_name = $_POST['adminname'];
        $password = $_POST['password'];

        $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM admin WHERE admin_name = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s", $admin_name);

        $stmt->execute();

        $result = $stmt->get_result();

        $admin = $result->fetch_assoc();

        if ($admin && $admin['pass'] === $password) {
            session_regenerate_id(true);

            $_SESSION['adminname'] = $admin_name;

            $conn->close();

            header("Location: admin_view_donor_list.php");
            exit();

        } else {
            $conn->close();
            $error_message = "Wrong admin name or password";
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
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin_login.css">

    <script> window.history.forward(); </script>

</head>

<body>
    <div class="login-container">
        <form class="login-form" method='post'>
            <h2 class="login"> <span id="L">Admin</span> Login</h2>
            <div class="inp">
                <div>
                    <label for="username"><strong>Admin name:</strong><input name="adminname" id="adminname" type="text" placeholder="Admin name"
                            class="input-field"></label>

                </div>
                <div>

                    <label for="password"><strong>Password:</strong><input name="password" type="password" id="password" placeholder="Password"
                            class="input-field"></label>
                </div>
                <button name='submit' type="submit" class="login-button">Login</button>
            </div>
        </form>
    </div>
</body>

</html>
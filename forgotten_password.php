<!DOCTYPE html>
<html>

<head>
    <title>Forgotten Password</title>
    <link rel="stylesheet" href="forgotten_password.css">
</head>

<body>
    <div class="container">

        <div class="forms">
            <div class="form_img"><img src="from_img.jpg" alt="" srcset=""></div>

            <form method="post">
                <h2><span>Forgot</span> <br>Your Password?</h2>
                <div class="input-group">
                    <label>Username:</label>
                    <input type="text" name="username" required>
                </div>

                <div class="input-group">
                    <label>NID:</label>
                    <input type="text" name="nid" required>
                </div>


                <input type="submit" value="Submit">
                <button onclick="goToLogin()" class="back-button">Back to Login</button>
            </form>

        </div>
    </div>


    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $nid = $_POST["nid"];
            
            $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $stmt = $conn->prepare("SELECT username, nid FROM user_list WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                if ($row["nid"] === $nid) {
                    $hashedPassword = password_hash("123456789", PASSWORD_DEFAULT);
                    $updateStmt = $conn->prepare("UPDATE user_list SET pass = ? WHERE username = ?");
                    $updateStmt->bind_param("ss", $hashedPassword, $username);
                    $updateStmt->execute();
                    $updateStmt->close();
                    
                    echo '<script>
                        alert("Password has been changed to default. Please change it as soon as you login.");
                        window.location.href = "login.php";
                    </script>';
                } else {
                    echo '<script>
                        alert("NID and username do not match.");
                        window.history.back();
                    </script>';
                }
            } else {
                echo '<script>
                    alert("Username does not exist"); 
                    window.history.back();
                </script>';
            }
            
            $stmt->close();
            $conn->close();
        }
    ?>
    
    <script>
        function goToLogin() {
            window.location.href = "login.php";
        }
    </script>

</body>

</html>
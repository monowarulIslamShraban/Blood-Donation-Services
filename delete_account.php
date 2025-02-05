 <?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $password = $_POST['password'];

    $username = $_SESSION['username'];

    $query = "SELECT * FROM user_list WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['pass'];

        if (password_verify($password, $hashedPassword)) {
            $deleteQuery = "DELETE FROM user_list WHERE username = '$username'";
            if ($conn->query($deleteQuery) === TRUE) {
                echo "<script>alert('Sorry! To see you go. Deletion successful');
                     window.location.href = 'index.php';
                </script>";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        } else {
            echo "<script>alert('Wrong Password!');
                window.history.back();
            </script>";
        }
    } else {
        echo "User not found";
    }

    $conn->close();
}

?> 


<!DOCTYPE html>
<html>

<head>
    <title>Delete Account</title>
    <link rel="stylesheet" href="delete_account.css">
</head>

<body>
    <div class="container">

        <h2><span>Delete</span> Account</h2>

        <form method="post">
            <div class="pass">
                <label for="pas">Password:</label>
                <input id="pas" type="password" name="password">

            </div>
            <div class="repeat"> <label for="rep">Repeat Password:</label>
                <input id="rep" type="password" name="confirm_password"><br>
            </div>


            <input type="submit" value="Delete Account">
        </form>

    </div>
</body>

</html>
 <?php

session_start();

$conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_SESSION['username'];

    $currentPass = $_POST['current_password']; 
    $newPass = $_POST['new_password'];
    $confirmNewPass = $_POST['confirm_new_password'];

    $query = "SELECT pass FROM user_list WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $dbHash = $row['pass'];

    if(password_verify($currentPass, $dbHash)){

        if($newPass === $confirmNewPass){

            $newHash = password_hash($newPass, PASSWORD_DEFAULT);
            
            $updateQuery = "UPDATE user_list SET pass='$newHash' WHERE username='$username'";
            mysqli_query($conn, $updateQuery);

            echo "<script>
                    alert('Password updated successfully!');
                    window.location.href = 'user_profile.php';
                </script>";

        } else {
            echo "<script> 
                alert('New passwords do not match!');
                window.history.back();
            </script>";
        }

    } 
    else {
        echo "<script> 
                alert('Current password is incorrect!'); 
                window.history.back();
            </script>";
    }

}

?> 


<!DOCTYPE html>
<html>

<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="change_password.css">
</head>

<body>
    <div class="container">

        <h2><span>Change</span> Password</h2>

        <form method="post">
            <!-- <br> -->
            <div class="changepass">
                <label for='curr'>Current Password:</label>
                <input id="curr" type="password" name="current_password">
            </div>
            <div class="newpass">
                <label for="new">New Password:</label>
                <input id="new" type="password" name="new_password">
            </div>

            <div class="confnewpass">
                <label for="conf">Confirm New Password:</label>
                <input id="conf" type="password" name="confirm_new_password">
            </div>
            <input type="submit" value="Change Password">
        </form>

    </div>
</body>

</html>
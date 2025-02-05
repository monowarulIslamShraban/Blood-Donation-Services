<?php
    session_start();

    $reported_by = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $donor_contact = $_POST['contact'];
        $report_box = $_POST['reason'];

        $db = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");

        // Checks if contact exists in user_list table
        $query = "SELECT contact FROM user_list WHERE contact=?";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "s", $donor_contact);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 0) {
            echo "<script>alert('None of our users have this contact number.');
            window.history.back(); 
            </script>";
        } 
        else { 
            $query = "INSERT INTO report_box (reported_by, donor_contact, report_box) 
                      VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($db, $query);
            mysqli_stmt_bind_param($stmt, "sss", $reported_by, $donor_contact, $report_box);
            
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Report submitted.');
                window.location='user_web_view.php';
                </script>";
            } 
            else {
                echo "Error submitting report: " . mysqli_error($db);
            }
        }

        mysqli_close($db);
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Report User</title>
    <link rel="stylesheet" href="report_form.css">
</head>

<body>
    <div class="container">
        <h2><span>Report</span> User</h2>
        <form method="post">
            <div class="contact">
                <div class="contact">
                    <label>Contact:</label>
                    <input type="text" name="contact"><br>
                </div>
            </div>
            <label>Report box:</label>
            <textarea name="reason" rows="4" cols="50"></textarea><br>
            <br>
            <input type="submit" value="Submit Report">
        </form>
    </div>
</body>

</html>
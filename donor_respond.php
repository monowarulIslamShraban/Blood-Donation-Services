<?php
    $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");
    session_start();

    $request_id = $_GET['request_id'];
    $donor_username = $_SESSION['username'];

    $sql_donor = "SELECT previous_donation FROM donor_list WHERE username='$donor_username'";
    $result_donor = mysqli_query($conn, $sql_donor);
    $row_donor = mysqli_fetch_assoc($result_donor);
    $last_donation = $row_donor['previous_donation'];

    $sql_needed_date = "SELECT date_needed FROM blood_requests WHERE request_id='$request_id'";
    $result_needed_date = mysqli_query($conn, $sql_needed_date);
    $row_needed_date = mysqli_fetch_assoc($result_needed_date);
    $needed_date = $row_needed_date['date_needed'];

    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $donation_date = $_POST['donation_date'];
        $donation_time = $_POST['donation_time'];
        $contact = $_POST['contact'];
        
        $donation_dt = $donation_date . ' ' . $donation_time;

        $sql = "INSERT INTO request_respond(b_request_id, d_respond_id, donation_dt, contact) 
                VALUES ($request_id, '$donor_username', '$donation_dt', '$contact')";
                
        mysqli_query($conn, $sql);
        
        header("Location: requests_list.php");
        exit();

    }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Donor Response</title>
    <link rel="stylesheet" href="donor_respond.css?v=1.3">
</head>

<body>
    <div class="container">
        <h2><span>Response</span> Form</h2>
        
        <div class="ld-box">
            <label>Your last donation was on <?php echo $last_donation; ?></label>
        </div>

        <div class="ld-box">
            <label>Blood is needed within <?php echo $needed_date; ?></label>
        </div>
        
        <br>
        <br>
        
        <form method="post">
            <div class="needed_contact">
                <div class="need">
                    <label>Donation date:</label>
                    <input type="date" name="donation_date" required>
                </div>
                <div class="need">
                    <label>Donation time:</label>
                    <input type="time" name="donation_time" required>
                </div>
                <div class="contact">
                    <label>Contact:</label>
                    <input type="text" name="contact" required>
                </div>
            </div>
            <input type="submit" value="Confirm Donation">
        </form>
    </div>
</body>

</html>
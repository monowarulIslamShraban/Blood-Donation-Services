<?php 

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $venue = $_POST['venue'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];  

        $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");

        $sql = "SELECT * FROM trusted_hospitals WHERE hospital_name='$venue'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            
            $sql = "INSERT INTO campaigns (venue, start_date, end_date)
                    VALUES ('$venue', '$start_date', '$end_date')";
                    
            mysqli_query($conn, $sql);
            
            echo "<script>
                    alert('Campaign added successfully');
                    window.location.href='admin_view_campaign_list.php';
                    </script>";

        }
        else {
            echo "<script>
                    var confirmAdd = confirm('This is not a trusted hospital. You need to add it to the Trusted List.');
                    if(confirmAdd) {
                        window.location.href='admin_add_trusted_hospitals.php';
                    }
                    else {
                        window.history.back();
                    }
                </script>";
        
        }

    }

?> 


<!DOCTYPE html>
<html>

<head>
    <title>add_campaign</title>
    <link rel="stylesheet" href="admin_add_campaign.css">
</head>

<body>
    <div class="container">
        <h2><span>BLOOD</span> DONATION CAMPAIGN</h2>
        <form method="post" action="">

            <label>Hospital Name:</label>
            <input type="text" name="venue"><br>

            <label>Start Date:</label>
            <input type="date" name="start_date" required>

            <label>End Date:</label>
            <input type="date" name="end_date" required><br>

            <input type="submit" value="Add Campaign">
        </form>
    </div>
</body>

</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");

        $hospital_name = $_POST['name'];
        $hospital_email = $_POST['hmail'];
        $hotline = $_POST['hotline'];
        $location = $_POST['location'];

        $query = "INSERT INTO trusted_hospitals(hospital_name, hospital_mail, hotline, location)
                    VALUES ('$hospital_name', '$hospital_email', '$hotline', '$location')";

        if(mysqli_query($conn, $query)){
            echo "<script>
                alert('Successfully added a new hospital!'); 
                window.location.href='admin_view_trusted_hospitals.php';
                </script>";
        
        } else {
            echo "Error adding hospital: " . mysqli_error($conn);
        
        }
        
        mysqli_close($conn);
    }

?> 


<!DOCTYPE html>
<html>

<head>
    <title>admin_add_trusted_hospitals</title>
    <link rel="stylesheet" href="admin_add_trusted_hospitals.css">
</head>

<body>
    <div class="container">
        <h2><span>ADD</span> NEW HOSPTIAL</h2>
        <form method="post" action="">

            <label>Hospital Name:</label>
            <input type="text" name="name" required>

            <div class="name_mail_hotline">
                <div class="name"><label>Hospital Email:</label>
                    <input type="text" name="hmail" required>
                </div>
                <div class="name"><label>Hotline:</label>
                    <input type="text" name="hotline" required>
                </div>
            </div>

            <label>Location:</label>
            <input type="text" name="location" required>

            <input type="submit" value="Add Hosptial">
        </form>
    </div>
</body>

</html>
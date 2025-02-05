<?php
session_start();

$conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['username'])) {
        $loggedInUsername = $_SESSION['username'];
    } else {
        exit("User not logged in.");
    }

    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    $hospital = $_POST['hospital'];
    $dateNeeded = $_POST['date_needed'];
    $contact = $_POST['contact'];

    $request_id = $_GET['request_id'];

    $updateQuery = "UPDATE blood_requests 
                    SET quantity='$quantity', hospital_unit='$unit', hospital_name='$hospital', date_needed='$dateNeeded', contact='$contact'
                    WHERE request_id='$request_id' AND request_by='$loggedInUsername'";
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        echo "<script>alert('Blood Request Updated Successfully!'); window.location.href='requests_list.php';</script>";
        exit();
    } else {
        echo "Error updating request: " . mysqli_error($conn);
    }
} else {
    if(isset($_GET['request_id'])) {
        $request_id = $_GET['request_id'];

        $fetchQuery = "SELECT * FROM blood_requests WHERE request_id='$request_id'";
        $result = mysqli_query($conn, $fetchQuery);
        $row = mysqli_fetch_assoc($result);

        if($row) {
            $quantity = $row['quantity'];
            $unit = $row['hospital_unit'];
            $hospital = $row['hospital_name'];
            $dateNeeded = $row['date_needed'];
            $contact = $row['contact'];
            $name = $row['name'];
        } else {
            echo "Request not found or unauthorized access.";
            exit();
        }
    } else {
        echo "Request ID not provided.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Blood Request</title>
    <link rel="stylesheet" href="request_blood.css?v=1">
</head>

<body>
    <div class="container">
        <h2><span>Edit</span> Request</h2>
        
        <div class="name-box">
            <label>Request For: <?php echo $name; ?></label>
        </div>
        
        <br>
        
        <form method="post">
            <div class="bloodtype_hu_Q">
                <div class="quantity">
                    <label>Quantity(Bags):</label>
                    <input type="number" name="quantity" value="<?php echo $quantity; ?>" min="1">
                </div>
                <div class="hu">
                    <label>Hospital Unit:</label>
                    <input type="text" name="unit" value="<?php echo $unit; ?>">
                </div>
            </div>
            <label>Hospital Name:</label>
            <input type="text" name="hospital" value="<?php echo $hospital; ?>"><br>
            <div class="needed_contact">
                <div class="need">
                    <label>Needed by:</label>
                    <input type="date" name="date_needed" value="<?php echo $dateNeeded; ?>">
                </div>
                <div class="contact">
                    <label>Contact:</label>
                    <input type="text" name="contact" value="<?php echo $contact; ?>"><br>
                </div>
            </div>
            <input type="submit" value="Update Changes">
        </form>
    </div>
</body>

</html>

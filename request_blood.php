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

    $name = $_POST['name'];
    $age = $_POST['age'];
    $bloodType = $_POST['blood_type'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    $hospital = $_POST['hospital'];
    $dateNeeded = $_POST['date_needed'];
    $contact = $_POST['contact'];
    $reason = $_POST['reason'];

    if (empty($name) || empty($age) || empty($bloodType) || empty($quantity) || empty($unit) || empty($hospital) || empty($dateNeeded) || empty($contact) || empty($reason)) {
        echo "<script>alert('All fields are required.\nPlease fill them up with correct information.')</script>";
    } else {
        $insertQuery = "INSERT INTO blood_requests (request_by, name, age, blood_group, quantity, hospital_unit, hospital_name, date_needed, contact, reason)
                         VALUES ('$loggedInUsername', '$name', '$age', '$bloodType', '$quantity', '$unit', '$hospital', '$dateNeeded', '$contact', '$reason')";
        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            echo "<script>alert('Blood Request Successful!')</script>";
            header("Location: user_web_view.php");
            exit();
        } else {
            echo "Error submitting request: " . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Request Blood</title>
    <link rel="stylesheet" href="request_blood.css">
</head>

<body>
    <div class="container">
        <h2><span>Request</span> For Blood</h2>
        <form method="post">
            <div class="name_age">
                <div class="name"><label>Name:</label>
                    <input type="text" name="name">
                </div>
                <div class="age">
                    <label>Age:</label>
                    <input type="number" name="age"><br>
                </div>
            </div>
            <div class="bloodtype_hu_Q">
                <div class="blood-type">
                    <label>Blood Type:</label>
                    <select name="blood_type">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="A+">O+</option>
                        <option value="A-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select><br>
                </div>
                <div class="quantity">
                    <label>Quantity(Bags):</label>
                    <input type="number" name="quantity" min="1">
                </div>
                <div class="hu">
                    <label>Hospital Unit:</label>
                    <input type="text" name="unit">
                </div>
            </div>
            <label>Hospital Name:</label>
            <input type="text" name="hospital"><br>
            <div class="needed_contact">
                <div class="need">
                    <label>Needed by:</label>
                    <input type="date" name="date_needed">
                </div>
                <div class="contact">
                    <label>Contact:</label>
                    <input type="text" name="contact"><br>
                </div>
            </div>
            <label>Reason:</label>
            <textarea name="reason" rows="4" cols="50"></textarea><br>
            <br>
            <input type="submit" value="Request For Blood">
        </form>
    </div>
</body>

</html>
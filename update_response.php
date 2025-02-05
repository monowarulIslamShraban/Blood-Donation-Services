<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");

    $username = $_SESSION['username'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = $_POST['action'];
        $requestId = $_POST['request_id'];

        if ($action === "accept") {
            $update_blood_requests = "UPDATE blood_requests SET quantity = quantity - 1 WHERE request_id = '$requestId'";
            mysqli_query($conn, $update_blood_requests);

            $update_donor_list = "UPDATE donor_list SET previous_donation = CURDATE(), responds = responds + 1 WHERE username IN (
                SELECT d_respond_id FROM request_respond WHERE b_request_id = '$requestId'
            )";
            mysqli_query($conn, $update_donor_list);

            $update_request_respond = "UPDATE request_respond SET ac = 1 WHERE b_request_id = '$requestId'";
            mysqli_query($conn, $update_request_respond);
        } elseif ($action === "discard") {
            $update_request_respond = "UPDATE request_respond SET dc = 1 WHERE b_request_id = '$requestId'";
            mysqli_query($conn, $update_request_respond);
        }
    }
?>
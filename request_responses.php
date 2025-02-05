<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>response_list</title>
    <link rel="stylesheet" href="request_responses.css?v=1.4.1">
    <script src="https://kit.fontawesome.com/ac5b348608.js" crossorigin="anonymous"></script>

    <script>
        function acceptDonation(requestId) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "update_response.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                        alert("Thanks for letting us know.");
                        location.reload();
                    } else {
                        alert("Error processing request. Please try again later.");
                    }
                }
            }
            xhr.send("action=accept&request_id=" + requestId);
        }

        function discardDonation(requestId) {
            if (confirm("Are you sure to decline the response?")) {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "update_response.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                            location.reload();
                        } else {
                            alert("Error processing request. Please try again later.");
                        }
                    }
                }

                xhr.send("action=discard&request_id=" + requestId);
            }
        }
    </script>

</head>

<body>
    <section>
        <h1><span>Responders' </span>list</h1>
        <div class="tbl-header">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Previous Donation</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table>
                <tbody>
                    <?php
                        session_start();
                        $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");

                        $username = $_SESSION['username'];

                        $query = "SELECT u.name, d.previous_donation, u.contact, r.b_request_id
                                FROM request_respond r
                                JOIN donor_list d ON r.d_respond_id = d.username
                                JOIN user_list u ON d.username = u.username
                                JOIN blood_requests b ON r.b_request_id = b.request_id
                                WHERE b.request_by = '$username' and r.ac = 0 and r.dc = 0";

                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $request_id = $row["b_request_id"];
                            
                            echo "<tr>
                                    <td>{$row['name']}</td>
                                    <td>{$row['previous_donation']}</td>
                                    <td>{$row['contact']}</td>
                                    <td>
                                        <button class='accept' onclick='acceptDonation($request_id)'>Received</button>
                                        <button class='discard' onclick='discardDonation($request_id)'>Will Not Need</button>
                                    </td>
                                </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <a href="user_web_view.php"><i class="fa-solid fa-circle-chevron-left"></i></a>
</body>

</html>
<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to get data from the database
    $sql = "SELECT br.request_by as requested_by, rr.d_respond_id as responded_by, rr.donation_dt,
                CASE 
                    WHEN rr.ac = 1 THEN 'Received'
                    WHEN rr.dc = 1 THEN 'Did Not Need'
                    WHEN br.date_needed < CURDATE() THEN 'Absent'
                    ELSE 'Pending' 
                END AS state
            FROM request_respond rr
            JOIN blood_requests br ON rr.b_request_id = br.request_id
            JOIN user_list ul ON br.request_by = ul.username;";

    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_view_response_list</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@3.6.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" type="text/css" href="admin_view.css">

</head>

<body>


    <div id="page_wrapper">
        <div id="sidenav" class="sidenav">
            <div class="logo_section">

                <h3>BLOOD DONATION</br>SERVICES</h3>
            </div>
            
            <div class="sidenav_header">
                <a href="admin_view_donor_list.php" class="active_color">
                    <div class="sidenav_link">
                        <h3>DONOR LIST</h3>
                    </div>
                </a>
                <a href="admin_view_user_list.php">
                    <div class="sidenav_link">
                        <h3>USER LIST</h3>
                    </div>
                </a>
                <a href="">
                    <div class="sidenav_link">
                        <h3>REQUEST LIST</h3>
                    </div>
                </a>
                <a href="admin_view_trusted_hospitals.php">
                    <div class="sidenav_link">
                        <h3>TRUSTED HOSPITALS</h3>
                    </div>
                </a>
                <a href="admin_view_campaign_list.php">
                    <div class="sidenav_link">
                        <h3>CAMPAIGN LIST</h3>
                    </div>
                </a>
                <a href="admin_view_report_box.php">
                    <div class="sidenav_link">
                        <h3>REPORT BOX</h3>
                    </div>
                </a>
                <a href="admin_view_response_list.php">
                    <div class="sidenav_link active">
                        <h3>RESPONSE LIST</h3>
                    </div>
                </a>

            </div>
            
            <form action="logout.php" method="post">
                <button type="submit">Log Out</button>
            </form>

        </div>
        <main>
            <header>
                <div class="text">
                    <h2 class="head_tran"><span>RESPONSE LIST</span></h2>
                    <p class="head_head">ALL RESPONSES HERE</p>
                </div>
            </header>
            <section class="List">

                <div class="tbl-header">
                    <table>
                        <thead>
                            <tr>
                                <th>Requested By</th>
                                <th>Responded By</th>
                                <th>Donation Date-Time</th>
                                <th>State</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="tbl-content">
                    <table>
                        <tbody>
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>{$row['requested_by']}</td>";
                                    echo "<td>{$row['responded_by']}</td>";
                                    echo "<td>{$row['donation_dt']}</td>";
                                    echo "<td>{$row['state']}</td>";
                                    echo "</tr>";
                                }

                                mysqli_free_result($result);
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>



    </div>



</body>

</html>
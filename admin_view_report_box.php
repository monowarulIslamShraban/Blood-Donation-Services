<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_view_report_box</title>
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
                <a href="admin_view_request_list.php">
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
                <a href="">
                    <div class="sidenav_link active">
                        <h3>REPORT BOX</h3>
                    </div>
                </a>
                <a href="admin_view_response_list.php">
                    <div class="sidenav_link">
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
                    <h2 class="head_tran"><span>REPORT BOX</span></h2>
                </div>
            </header>
            <section class="List">
                <div class="tbl-header">
                    <table>
                        <thead>
                            <tr>
                                <th>Reported</th>
                                <th>Reported by</th>
                                <th>Report Reason</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="tbl-content">
                    <table>
                        <tbody>
                            <?php

                                $sql = "SELECT u.username, r.reported_by, r.report_box  
                                        FROM report_box r 
                                        JOIN user_list u ON r.donor_contact = u.contact";

                                $result = mysqli_query($conn, $sql);

                                    // Output data from each row  
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['username'] . "</td>"; 
                                    echo "<td>" . $row['reported_by'] . "</td>";
                                    echo "<td>" . $row['report_box'] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>

        </main>


    </div>
</body>
</html>
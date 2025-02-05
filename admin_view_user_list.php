<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_view_user_list</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@3.6.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" type="text/css" href="admin_view.css">
    
    <script>
        function confirmDelete(username) {
            if (confirm("Are you sure you want to remove this account from the database?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "admin_delete_user.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            location.reload();
                        } else {
                            console.error("Error deleting user.");
                        }
                    }
                };
                xhr.send("username=" + encodeURIComponent(username));
            }
        }
    </script>
</head>

<body>


    <div id="page_wrapper">
        <div id="sidenav" class="sidenav">
            <div class="logo_section">
                <h3>BLOOD DONATION</br>SERVICES</h3>
            </div>
            
            <div class="sidenav_header">
                <a href="admin_view_donor_list.php" class="active_color">
                    <div class="sidenav_link ">
                        <h3>DONOR LIST</h3>
                    </div>
                </a>
                <a href="">
                    <div class="sidenav_link active">
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
                <a href="admin_view_report_box.php">
                    <div class="sidenav_link">
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
                    <h2 class="head_tran"><span>USER LIST</span></h2>
                    <p class="head_head">ALL USER HERE</p>
                </div>
            </header>
            <section class="List">
                <div class="tbl-header">
                    <table>
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Age</th>
                                <th>Blood Group</th>
                                <th>Contact</th>
                                <th>Police Station</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="tbl-content">
                    <table>
                        <tbody>
                            <?php

                                $query = "SELECT * FROM user_list";
                                $result = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['age'] . "</td>";
                                    echo "<td>" . $row['blood_group'] . "</td>";
                                    echo "<td>" . $row['contact'] . "</td>";
                                    echo "<td>" . $row['police_station'] . "</td>";
                                    echo "<td>" . $row['city'] . "</td>";
                                    echo "<td><input class='delete' type='button' value='Delete' onclick='confirmDelete(\"" . $row['username'] . "\")'></td>";
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
</body>

</html>
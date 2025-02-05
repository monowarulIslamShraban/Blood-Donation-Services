<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_view_trusted_hospitals</title>
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
                <a href="">
                    <div class="sidenav_link active">
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
                    <h2 class="head_tran"><span>TRUSTED HOSPITALS</span></h2>
                    <p class="head_head">ALL TRUSTED HOSPITALS ARE LISTED HERE</p>
                </div>
            </header>
            <section class="List">
                <div class="tbl-header">
                    <table>
                        <thead>
                            <tr>
                                <th>Hospital Name</th>
                                <th>Hospital Mail</th>
                                <th>Hotline</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="tbl-content">
                    <table>
                        <tbody>
                        <?php
                            $query = "SELECT * FROM trusted_hospitals";

                            $result = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>" . $row['hospital_name'] . "</td>";
                                echo "<td>" . $row['hospital_mail'] . "</td>";
                                echo "<td>" . $row['hotline'] . "</td>";
                                echo "<td><a href='" . $row['location'] . "' target='_blank'>View on Map</a></td>";
                                echo "</tr>";
                            }

                        ?>
                        </tbody>
                    </table>
                </div>

            </section>
            
            <p></br></p>
            <form action="admin_add_trusted_hospitals.php" method="GET">
                <input class="add" type="submit" value="Add Hospital">
            </form>


        </main>


    </div>



</body>

</html>
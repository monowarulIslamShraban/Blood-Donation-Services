<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaigns</title>
    <link rel="stylesheet" href="campaign_list.css">
    <script src="https://kit.fontawesome.com/ac5b348608.js" crossorigin="anonymous"></script>

</head>

<body>
    <section>
        <h1><span>ON GOING</span> CAMPAIGNS</h1>
        <div class="tbl-header">
            <table>
                <thead>
                    <tr>
                        <th>Venue Hospital</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Location</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table>
                <tbody>

                    <?php
                        $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");
                        
                        $currentDate = date("Y-m-d");
                        $query = "SELECT c.venue, c.start_date, c.end_date, h.location
                                    FROM campaigns c
                                    JOIN trusted_hospitals h ON c.venue = h.hospital_name
                                    WHERE c.end_date >= '$currentDate'
                                    ORDER BY c.end_date ASC";
                        $result = mysqli_query($conn, $query);
                        
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>". $row['venue'] ."</td>";
                            echo "<td>". $row['start_date'] ."</td>";
                            echo "<td>". $row['end_date'] ."</td>";
                            echo "<td><a href='" . $row['location'] . "' target='_blank'>View on Map</a></td>";
                            echo "</tr>";
                        }
                    ?>

                </tbody>
            </table>
        </div>
    </section>
    <a onclick="history.back();"><i class="fa-solid fa-circle-chevron-left"></i></a>
</body>

</html>
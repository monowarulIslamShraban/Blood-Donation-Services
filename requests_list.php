<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests List</title>
    <link rel="stylesheet" href="requests_list.css?v=1.3">
    <script src="https://kit.fontawesome.com/ac5b348608.js" crossorigin="anonymous"></script>

    <script>
        <?php if(isset($_SESSION['username'])) : ?>
            <?php
                $username = $_SESSION['username'];
                $checkDonorQuery = "SELECT * FROM donor_list WHERE username = '$username'";
                $checkDonorResult = mysqli_query($conn, $checkDonorQuery);
                $isDonor = mysqli_num_rows($checkDonorResult) > 0;
            ?>
        <?php endif; ?>

        function respondButtonClick(requestId) {
            <?php if(isset($_SESSION['username'])) : ?>
                <?php if($isDonor) : ?>
                    window.location.href = 'donor_respond.php?request_id=' + requestId;
                <?php else : ?>
                    alert('You need to become a donor first.');
                    window.location.href = 'user_web_view.php';
                <?php endif; ?>
            <?php else : ?>
                alert('Please log in before responding.');
            <?php endif; ?>
        }
    </script>

</head>

<body>
    <section>
        <h1><span>Requests </span>list</h1>
        <div class="tbl-header">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Blood Group</th>
                        <th>Quantity</th>
                        <th>Needed By</th>
                        <th>Contact</th>
                        <th>Hospital Name</th>
                        <th>Hospital Unit</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table>
                <tbody>
                    <?php
                        $currentDate = date("Y-m-d");
                        $query = "SELECT * FROM blood_requests WHERE quantity > 0 and date_needed >= '$currentDate' ORDER BY date_needed, quantity DESC";
                        $result = mysqli_query($conn, $query);
                        
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>". $row['name'] ."</td>";
                            echo "<td>". $row['blood_group'] ."</td>";
                            echo "<td>". $row['quantity'] ."</td>";
                            echo "<td>". $row['date_needed'] ."</td>";
                            echo "<td>". $row['contact'] ."</td>";
                            echo "<td>". $row['hospital_name'] ."</td>";
                            echo "<td>". $row['hospital_unit'] ."</td>";

                            $hospitalName = $row['hospital_name'];
                            $checkQuery = "SELECT location FROM trusted_hospitals WHERE hospital_name = '$hospitalName'";
                            $checkResult = mysqli_query($conn, $checkQuery);
                            $locationRow = mysqli_fetch_assoc($checkResult);

                            if ($locationRow) {
                                $location = $locationRow['location'];
                                echo '<td><a href="' . $location . '" target="_blank" style=" margin: 0;">View On Map</a></td>';
                            } 
                            else {
                                echo "<td>Contact for Location</td>";
                            }

                            if(isset($_SESSION['username']) && $row['request_by'] == $_SESSION['username']){
                                echo "<td><a class='edit' href='request_blood_edit.php?request_id=" . $row['request_id'] . "' style='margin: 0;'>Edit Request</a></td>";
                            } else {
                                echo "<td><a class='respond' href='#' onclick='respondButtonClick(" . $row['request_id'] . ")' style='margin: 0;'>Respond</a></td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <a href="user_web_view.php"><i class="fa-solid fa-circle-chevron-left"></i></a>
</body>

</html>
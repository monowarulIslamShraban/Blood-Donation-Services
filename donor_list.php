<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor List</title>
    <link rel="stylesheet" href="donor_list.css">
    <script src="https://kit.fontawesome.com/ac5b348608.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="sec">
        <section class="dash">
            <div class="dashboard">
                <div class="blood">
                    <h6 class="dt">Blood Group</h6>
                    <select class="options" id="bloodGroup" name="blood">
                        <option value="All">All</option>
                        <option value="A+">A+</option>
                        <option value="B+">B+</option>
                        <option value="O+">O+</option>
                        <option value="AB+">AB+</option>
                        <option value="A-">A-</option>
                        <option value="B-">B-</option>
                        <option value="O-">O-</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>

                <div class="police_station">
                    <h6 class="dt">Police Station</h6>
                    <input class="police_station" id="policeStation" name="police_station" type="text">
                </div>

                <div class="city">
                    <h6 class="dt">City</h6>
                    <input class="city" id="city" name="city" type="text">
                </div>

                <button class="app" onclick="applyFilters()">Apply Filters</button>
                <a onclick="history.back();"><i class="fas fa-chevron-left"></i></a>
            </div>
        </section>
        <section class="List">
            <h1><span>Donor </span>List</h1>
            <div class="tbl-header">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Blood Group</th>
                            <th>Contact</th>
                            <th>Police Station</th>
                            <th>City</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table>
                    <tbody>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");
                        
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $query = "SELECT u.name, u.age, u.blood_group, u.contact, u.police_station, u.city
                                    FROM donor_list d
                                    INNER JOIN user_list u ON d.username = u.username
                                    ORDER BY d.responds DESC";
                            
                        $result = mysqli_query($conn, $query);
                            
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<tr class="data-row">';
                            echo '<td>'. $row['name'] .'</td>';
                            echo '<td>'. $row['age'] .'</td>';
                            echo '<td>'. $row['blood_group'] .'</td>';
                            echo '<td>'. $row['contact'] .'</td>';
                            echo '<td>'. $row['police_station'] .'</td>';
                            echo '<td>'. $row['city'] .'</td>';
                            echo '</tr>';
                        }

                        mysqli_close($conn);
                    ?>
                    </tbody>
                </table>
            </div>
        </section>
    </section>
    <script>

        // javascript For filters ;-; [it was easy that's why]
        function applyFilters() {
            var bloodGroup = document.getElementById("bloodGroup").value;
            var city = document.getElementById("city").value;
            var policeStation = document.getElementById("policeStation").value;

            var rows = document.querySelectorAll(".tbl-content tbody tr");

            rows.forEach(function (row) {
                var bloodCell = row.querySelector("td:nth-child(3)").textContent;
                var cityCell = row.querySelector("td:nth-child(6)").textContent;
                var policeStationCell = row.querySelector("td:nth-child(5)").textContent;

                if ((bloodGroup === "All" || bloodCell === bloodGroup) &&
                    (city === "" || cityCell.toLowerCase().includes(city.toLowerCase())) &&
                    (policeStation === "" || policeStationCell.toLowerCase().includes(policeStation.toLowerCase()))) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
</body>

</html>
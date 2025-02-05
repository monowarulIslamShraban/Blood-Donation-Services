<?php
    $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");

    $query = "SELECT * FROM trusted_hospitals";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trusted Hospitals</title>
    <link rel="stylesheet" href="trusted_hospitals.css">
</head>

<body>
    <section>
        <h1><span>Trusted</span> Hospitals</h1>
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
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td>
                            <?php echo $row['hospital_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['hospital_mail']; ?>
                        </td>
                        <td>
                            <?php echo $row['hotline']; ?>
                        </td>
                        <td>
                            <a href="<?php echo $row['location']; ?>" target="_blank">
                                View on Map
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
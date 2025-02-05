<?php

    $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");

    session_start();

    if (!isset($_SESSION['username'])) {
        echo "<script>
            alert('You had logged out previously. Please login again.');
            window.location.href = 'login.php';
        </script>";
        
        exit;
    }

?>


<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="user_profile.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/ac5b348608.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .output-box {
            border: 2px solid #e36d53;
            padding: 5px;
            margin: 5px 0;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <header class="container mb-10">
        <nav class='mx-auto mt-6'>
            <div class="navbar bg-[#e36d53] flex justify-between rounded-full">
                <div class="nav_s">
                    <div class="dropdown">
                        <label tabindex="0" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </label>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a href="user_web_view.php">Home</a></li>
                            <li><a href="our_team\ourteam.html">Our Team</a></li>
                            <li><a href="requests_list.php">Blood Requests</a></li>
                            <li><a href="donor_list.php">Donor List</a></li>
                            <li><a href="campaign_list.php">Campaings</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-ghost font-semibold text-2xl"><span class="text-red-800">BLOOD</span> DONATION</span> SERVICES</a>
                </div>
                <div class="nav-m hidden lg:visible lg:flex">
                    <ul class="menu menu-horizontal px-1 text-lg">
                        <li><a href="user_web_view.php">Home</a></li>
                        <li><a href="our_team\ourteam.html">Our Team</a></li>
                        <li><a href="requests_list.php">Blood Requests</a></li>
                        <li><a href="donor_list.php">Donor List</a></li>
                        <li><a href="campaign_list.php">Campaings</a></li>
                    </ul>
                </div>
                <div class="dropdown dropdown-end">
                    <label tabindex="0" for="my_modal_7" class="btn rounded-full bg-[#f7f5f5] mr-2 hover:bg-slate-100">
                        <i class="fa-solid fa-user text-2xl text-black"></i></label>
                    <ul tabindex="0"
                        class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                        <li>
                            <a class="justify-between" href="user_profile.php">
                                Profile
                            </a>
                        </li>

                        <li>
                            <a class="justify-between" href="request_responses.php">
                                Request responses
                            </a>
                        </li>

                        <li>
                            <a class="justify-between" href="report_form.php">
                                Report user
                            </a>
                        </li>

                        <li>
                            <a class="justify-between" href="index.php?logout=1">
                                Logout
                            </a>
                        </li>
                        <?php
                            if(isset($_GET['logout'])) {
                                session_destroy();
                                header('Location: index.php');
                                exit;
                            }  
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section card mb-4 rounded-4">
                        <div class="acc fs-4 font-weight-bold ps-4 pt-1">Account</div>
                        <div class="card-body">
                            <?php
                                $username = $_SESSION['username'];

                                $sql = "SELECT * FROM user_list WHERE username='$username'";
                                $result = mysqli_query($conn, $sql);

                                $user = mysqli_fetch_assoc($result);

                            ?>

                            <p class="output-box"><strong>Username:</strong>
                                <?php echo $user['username']; ?>
                            </p>
                            <p class="output-box"><strong>Name:</strong>
                                <?php echo $user['name']; ?>
                            </p>
                            <p class="output-box"><strong>Gender:</strong>
                                <?php echo $user['gender']; ?>
                            </p>
                            <p class="output-box"><strong>Age:</strong>
                                <?php echo $user['age']; ?>
                            </p>
                            <p class="output-box"><strong>Police Station:</strong>
                                <?php echo $user['police_station']; ?>
                            </p>
                            <p class="output-box"><strong>City:</strong>
                                <?php echo $user['city']; ?>
                            </p>
                            <p class="output-box"><strong>Email:</strong>
                                <?php echo $user['email']; ?>
                            </p>
                            <p class="output-box"><strong>Contact:</strong>
                                <?php echo $user['contact']; ?>
                            </p>
                            <p class="output-box"><strong>Blood Group:</strong>
                                <?php echo $user['blood_group']; ?>
                            </p>

                            <button class="btn-color" type="button"><a href="change_password.php">Change password</a></button>
                            <button class="btn-color" type="button"><a href="delete_account.php">Delete Acccount</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
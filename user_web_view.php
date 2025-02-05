<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOOD DONATION SERVICES | an online platform which you can trust</title>
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/ac5b348608.js" crossorigin="anonymous"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap');
    </style>
</head>


<body>
    <header class="h-auto">
        <nav class='container mx-auto mt-6'>
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
                            <li><a href="">Home</a></li>
                            <li><a href="our_team\ourteam.html">Our Team</a></li>
                            <li><a href="requests_list.php">Blood Requests</a></li>
                            <li><a href="donor_list.php">Donor List</a></li>
                            <li><a href="campaign_list.php">Campaings</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-ghost normal-case text-2xl"><span class="text-red-800">BLOOD</span> DONATION</span> SERVICES</a>
                </div>
                <div class="nav-m hidden lg:visible lg:flex">
                    <ul class="menu menu-horizontal px-1 text-lg">
                        <li><a href="">Home</a></li>
                        <li><a href="our_team\ourteam.html">Our Team</a></li>
                        <li><a href="requests_list.php">Blood Requests</a></li>
                        <li><a href="donor_list.php">Donor List</a></li>
                        <li><a href="campaign_list.php">Campaings</a></li>
                    </ul>
                </div>
                <div class="dropdown dropdown-end">
                    <label tabindex="0" for="my_modal_7" class="btn"> <i
                            class="fa-solid fa-user text-2xl text-black"></i></label>
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
        <section class="container  mx-auto mt-10 flex justify-between items-center">
            <div class="text-info text-black w-1/2 space-y-6">
                <h1 class="text-3xl font-thin">Let your Blood save lives</h1>
                <h1 class="text-5xl font-bold">Let Our Service Make</br>Your Life Better</h1>
                <div class="flex justify-between border-slate-950 w-[500px]">
                <div class="flex justify-between border-slate-950 w-[500px]">
                    <div class="use">
                        <h1 class="text-4xl">
                            <?php 
                                $conn = mysqli_connect("localhost","root","370_summer23","blood_donation_services");
                                $result = mysqli_query($conn,"SELECT COUNT(*) AS count FROM user_list");
                                $row = mysqli_fetch_assoc($result); 
                                echo $row['count'];
                            ?>
                        </h1>
                        <p class="text-lg">Users</p>
                    </div>

                    <div class="use">
                        <h1 class="text-4xl">
                            <?php
                                $result = mysqli_query($conn,"SELECT COUNT(*) AS count FROM donor_list");
                                $row = mysqli_fetch_assoc($result);
                                echo $row['count']; 
                            ?>
                        </h1>
                        <p class="text-lg">Donors</p>
                    </div>

                    <div class="use">
                        <h1 class="text-4xl">
                            <?php
                                $result = mysqli_query($conn,"SELECT COUNT(*) AS count FROM trusted_hospitals"); 
                                $row = mysqli_fetch_assoc($result);
                                echo $row['count'];
                            ?>
                        </h1>
                        <p class="text-lg">Trusted Hospitals</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="header_banner w-1/2">
                <img class="w-full mix-blend-multiply" src="./blood-donation-concept-illustration/5266696.jpg" alt="">
            </div>

        </section>
    </header>

    <?php
        if (isset($_SESSION['username'])) {
            $conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");

            $username = $_SESSION['username'];

            $query = "SELECT COUNT(*) AS count FROM donor_list WHERE username = '$username'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $is_donor = $row['count'] > 0;

            mysqli_close($conn);
        }
        else{
            echo "<script>
                alert('You had logged out previously. Please login again.');
                window.location.href = 'login.php';
            </script>";
            
            exit;
        }
    ?>

    <main class="flex flex-col justify-center items-center mt-9">
        <section class="donate  text-center space-x-10">

            <button class="bg-[coral] p-5 rounded-3xl font-semibold" type="button">
                <?php
                    if (isset($_SESSION['username'])) {
                        if ($is_donor) {
                            echo "You are a Donor";
                        } else {
                            echo '<a href="donation_form.php">Become a Donor</a>';
                        }
                    }
                ?>
            </button>

            <button class="bg-[coral] p-5 rounded-3xl font-semibold" type="button">
                <a href="request_blood.php">Request For Blood</a>
            </button>

        </section>
    </main>

</body>

</html>
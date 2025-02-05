<!-- USER LOGIN STUFF -->

<!-- Logout Check -->
<?php
    session_start();

    header('Cache-Control: no-store, no-cache, must-revalidate');

    if(isset($_GET['logout'])) {
        session_regenerate_id(true);
        session_destroy();
        
        header('Location: index.php');
        exit;
    }
?>

<!-- ------------------------------------------------------------ -->


<!-- ADMIN LOGIN STUFF -->

<!-- ------------------------------------------------------------ -->


<!-- Browser History clear -->
<script>
    window.onload = function() {
        document.title = "Blood Donation Services";  
        window.history.replaceState({}, '', window.location.href); 
    }
</script>


<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOOD DONATION SERVICES</title>
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/ac5b348608.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap');
    </style>
</head>


<body>
    <header class="">
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
                        </ul>
                    </div>
                    <a class="btn btn-ghost normal-case text-2xl"><span class="text-red-800">BLOOD</span> DONATION </span> SERVICES</a>
                </div>
                <div class="nav-m hidden lg:visible lg:flex">
                    <ul class="menu menu-horizontal px-1 text-lg">
                        <li><a href="">Home</a></li>
                        <li><a href="our_team\ourteam.html">Our Team</a></li>
                    </ul>
                </div>
                <div class="lg:visible nav_e login">
                    <!-- The button to open modal -->
                    <label for="my_modal_7" class="btn"> <i class="fa-solid fa-user text-2xl text-black"></i></label>


                    <input type="checkbox" id="my_modal_7" class="modal-toggle" />
                    <div class="modal" id="index">
                        <div class="modal-box flex flex-col justify-center items-center space-y-6">
                            <div class="form-control mt-6">
                                <a href="login.php"><button class="btn btn-primary ">Login</button></a>
                            </div>
                            <h1>Don't have any account?</h1>
                            <div class="form-control">
                                <a href="register.php"> <button class="btn btn-primary">Register Now</button></a>
                            </div>
                            <div class="form-control mt-6">
                                <a href="admin_login.php"><button class="btn btn-primary ">Login as Admin</button></a>
                            </div>
                        </div>
                        <label class="modal-backdrop" for="my_modal_7">Close</label>
                    </div>
                </div>
            </div>
        </nav>
        <section class="container mx-auto mt-10 flex justify-between items-center">
            <div class="text-info text-black w-1/2 space-y-6">
                <h1 class="text-3xl font-thin">Let your Blood save lives</h1>
                <h1 class="text-5xl font-bold">Let Our Service Make</br>Your Life Better</h1>

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
            <div class="header_banner w-1/2">
                <img class="w-full mix-blend-multiply" src="./blood-donation-concept-illustration/5266696.jpg" alt="">
            </div>

        </section>
        <section class="container mx-auto mt-[100px] flex justify-center">
            <div class="feature-img flex-1 w-1/2">
                <img class="w-full mix-blend-multiply" src="features_img.png" alt="">
            </div>
            <div class="features flex-1 w-1/2">
                <div class="collapse collapse-arrow bg-base-200">
                    <input type="radio" name="my-accordion-2" checked="checked" />
                    <div class="collapse-title text-xl font-medium">
                        Users
                    </div>
                    <div class="collapse-content">
                        <p>Plenty of Donors and non-donating users are available on this platform from the different parts of the country.</p>
                    </div>
                </div>
                <div class="collapse collapse-arrow bg-base-200">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title text-xl font-medium">
                        Blood Requestors
                    </div>
                    <div class="collapse-content">
                        <p>Blood requestors can either post a public request for blood with needed info or 
                            they can look for Donors from their own area by filtering with Police Station, City and Blood Group and contact a suitable donor in the time of emergencey.</p>
                    </div>
                </div>
                <div class="collapse collapse-arrow bg-base-200">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title text-xl font-medium">
                        Blood Donors
                    </div>
                    <div class="collapse-content">
                        <p>The Donors can use our services to easily find the hospitals to respond to the requestors or to participate in a 
                            Blood Donation Campaign arranged by us with the help of our Trusted Hosptials</p>
                    </div>
                </div>
                <div class="collapse collapse-arrow bg-base-200">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title text-xl font-medium">
                        Trusted Hospitals
                    </div>
                    <div class="collapse-content">
                        <p>There are a number of hospitals that we have created our connections to which we are calling Trusted Hospitals
                             and we are always working on building the network larger and expanding our services</p>
                    </div>
                </div>
                <div class="collapse collapse-arrow bg-base-200">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title text-xl font-medium">
                        Trust
                    </div>
                    <div class="collapse-content">
                        <p>All the Donors from our Donor List are safe to receive blood from. As we only accept donors aprroved from our Trusted Hospitals.</p>
                    </div>
                </div>
                <div class="collapse collapse-arrow bg-base-200">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title text-xl font-medium">
                        Blood Donation Campaigns
                    </div>
                    <div class="collapse-content">
                        <p>We frequently arrange Blood Donation Campaigns with the help of our Trusted Hospitals and we encourage our
                             donors to regularly participate in these Donation Campaigns.</p>
                    </div>
                </div>
                <div class="collapse collapse-arrow bg-base-200">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title text-xl font-medium">
                        Report box
                    </div>
                    <div class="collapse-content">
                        <p>We have a "Report Box" section where users can go and report other users with whom they have had a bad experience,
                             either while donating blood or receiving it. </p>
                    </div>
                </div>
                <div class="collapse collapse-arrow bg-base-200">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title text-xl font-medium">
                        Admin Panel
                    </div>
                    <div class="collapse-content">
                        <p>The Admin Panel can keep an eye on the proceedings starting from Blood Requests, Donors List to building connections 
                            with more hospitals as Trusted Hospitals. And help more people out through arranging frequent Blood Donation Campaigns 
                            for the blood banks of the Trusted Hospitals. The Admins can also keep a close eye on the Report Box so that no user can use the platform for anything inappropriate
                            (Eg: Fake request for blood, Not showing up after confirmation as a donor etc.)</p>
                    </div>
                </div>
            </div>
        </section>
    </header>

</body>

</html>
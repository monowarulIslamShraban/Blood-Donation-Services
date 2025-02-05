<?php

$conn = mysqli_connect("localhost", "root", "370_summer23", "blood_donation_services");


if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $contact = $_POST['con']; 
    $age = $_POST['age'];
    $blood_group = $_POST['blood_group'];
    $nid = $_POST['nid']; 
    $gender = $_POST['gender'];
    $police_station = $_POST['police_station'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];


    $errors = array();

    $u = "SELECT username FROM user_list WHERE username = '$username' ";
    $uu = mysqli_query($conn, $u);

    $e = "SELECT email FROM user_list WHERE email = '$email' ";
    $ee = mysqli_query($conn, $e);

    $n = "SELECT nid FROM user_list WHERE nid = '$nid' ";
    $nn = mysqli_query($conn, $n);

    $c = "SELECT contact FROM user_list WHERE contact = '$contact' ";
    $cc = mysqli_query($conn, $c);

    if (mysqli_num_rows($uu) > 0){
        $errors['u'] = "  *User Name Exists! Create another one.";
    }

    if (mysqli_num_rows($ee) > 0){
        $errors['e'] = "  *Email Exists! Use another one";
    }

    if (mysqli_num_rows($nn) > 0){
        $errors['n'] = "  *NID Exists!";
    }

    if (mysqli_num_rows($cc) > 0){
        $errors['c'] = "  *Contact Exists! Use another one";
    }


    if(strlen($pass) < 8){
        $errors['p'] = "  *Password is too short";
    }else{
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    }

    if(empty($name) || empty($username) || empty($contact) || empty($age) || empty($blood_group) || empty($nid) || empty($gender) || empty($police_station) || empty($city) || empty($email) || empty($pass))
    {
        die("All fields are required");
    }
    
    if(count($errors)==0){
        $sql = "INSERT INTO user_list(username, name, contact, email, pass, age, blood_group, NID, gender, police_station, city)
                 VALUES('$username', '$name', '$contact', '$email', '$pass', '$age', '$blood_group', '$nid', '$gender', '$police_station', '$city')";
        
        $result = mysqli_query($conn, $sql);

        if ($result) {
        echo "<script>
              alert('Registered Successfully! Now you can proceed to login.');
              window.location.href = 'login.php';
          </script>";
        } else {
            echo "<script>alert('Failed!')</script>";
        }     

    }

    mysqli_close($conn);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank > Register Now </title>
    <link rel="stylesheet" href="register.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/ac5b348608.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap');
    
        .reg_form input,
        .reg_form select {
            height: 40x;
        }
    </style>
</head>

<body>
    <main class="flex flex-col space-y-6 justify-center items-center mt-9 mb-9">
        <h1 class="text-5xl text-center font-extrabold"><span class="text-[#295a8b]">Register</span> Here!</h1>
        <section class="registration flex items-center justify-evenly rounded-2xl pt-5 pb-5">
            <div class="w-1/2"><img class="w-full" src="./undraw_medicine_b1ol.png" alt=""></div>
            <div class="reg_form space-y-9 w-1/2  bg-[#91C8E4] p-4 rounded-xl mr-5">

                <div class="space-y-5">
                    <form method="POST">
                        <div class="mb-4">
                            <label for="name"><strong>Name:</strong></label> <br>
                            <input name="name" class="w-[300px] bg-transparent border-b-2"
                                id="name" type="text" required>
                        </div>
                        <div class="mb-4">
                            <label for="Uname"><strong>User Name:</strong></label> <br>
                            <input name="username" class="w-[300px] bg-transparent border-b-2"
                                id="Uname" type="text" placeholder="Enter an username. Must be unique..." required>
                            <p style="color: red" class="text-danger"><?php if(isset($errors['u'])) echo $errors['u']; ?></p>
                            </div>
                        <div class="mb-4"> 
                            <label for="con"><strong>Contact:</strong></label><br>
                            <input name="con" class="w-[300px] bg-transparent border-b-2"
                                id="con" type="text" required>
                            <p style="color: red" class="text-danger"><?php if(isset($errors['c'])) echo $errors['c']; ?></p>
                        </div>
                        <div class="mb-4"> 
                            <label for="ag"><strong>Age:</strong></label><br>
                            <input name="age" class="w-[300px] bg-transparent border-b-2" id="ag"
                                type="text" required>
                        </div>
                        <div class="mb-4">
                            <label for="bg"><strong>Blood Group:</strong></label> <br>
                            <select name="blood_group" class="w-[100px] bg-transparent text-black" id="bg" required>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="nid"><strong>NID:</strong></label> <br> 
                            <input name="nid" class="w-[300px] bg-transparent border-b-2" type="text" id="nid" required>
                            <p style="color: red" class="text-danger"><?php if(isset($errors['n'])) echo $errors['n']; ?></p>
                        </div>
                        <div class="mb-4">
                            <label for="ps"><strong>Police Station:</strong></label> <br> 
                            <input name="police_station" id="ps" class="w-[300px] bg-transparent border-b-2"
                                type="text" required>
                        </div>
                        <div class="mb-4">
                            <label for="city"><strong>City:</strong></label> <br> 
                            <input name="city" id="city" class="w-[300px] bg-transparent border-b-2"
                                type="text" required>
                        </div>
                        <div class="mb-4">
                            <label for="email"><strong>Email:</strong></label> <br>
                            <input name="email" class="bg-transparent border-b-2 w-[300px] " type="email" id="email" required>
                            <p style="color: red" class = "text-danger"><?php if(isset($errors['e'])) echo $errors['e']; ?></p>
                        </div>
                        <div class="mb-4">
                            <label for="pass"><strong>Password</strong>(Change the default password):</label> <br>
                            <input name="pass" class="bg-transparent border-b-2 w-[300px] " type="password" id="pass" value="123456789" required>
                            <p style="color: red" class = "text-danger"><?php if(isset($errors['p'])) echo $errors['p']; ?></p>
                        </div>
                        <div class="mb-4">
                            <label for="Gender"><strong>Gender</strong> <br> 
                                <input name="gender" id="Gender" class="bg-transparent border-b-2 w-[300px]"
                                    type="text" name="Gender" placeholder="Male/Female/Other" required>
                        </div>
                            <button class="bt text-white p-5 rounded-lg" name="register" value="register" type="submit">Register</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
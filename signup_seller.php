<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">

            html, body {
                /* height: 100%; */
                /* background-color: blue;
                background-image: linear-gradient(to right, #21007E, #E51EB6); */
            }

            .avatar{
                width:100px;
                position: absolute;
                top: -50px;
                left: calc(50% - 50px);
            }

            .error {color: #FF0000;}


            .form-inline input {
              margin: 5px 10px 5px 0;
              padding: 10px;
              background-color: #fff;
              border: 1px solid #8E8E93;
              align: center;
            }

            .form-inline input[type="password"],input[type="text"]{
                width :80%;
            }

            .form-inline input[type="submit"]{
                width :85%;
                background-color: coral;
                color: white;
                font-size: 15px;
            }

            select{
                margin: 5px 10px 5px 0;
                padding: 10px;
                background-color: #fff;
                border: 1px solid #8E8E93;
                align: center;
                width: 85%;
            }

            .form-outline{
                border-style: outset;
                padding: 50px 0px 10px 50px;
                width: 400px;
                height: auto;
                border-radius: 5px;
                top: 55%;
                left: 50%;
                position: absolute;
                transform: translate(-50%,-50%);
            }



        </style>
    </head>

    <?php
        $name = "";
        $password = "";
        $cnf_password = "";
        $username = "";
        $nameErr = "";
        $usernameErr = "";
        $passwordErr = "";
        $cnf_passwordErr = "";
        $locationErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Username
            if (empty($_POST["username"]))
              $usernameErr = "Username is required";
            else
              $username = test_input($_POST["username"]);

            // Password
            if (empty($_POST["password"]))
              $passwordErr = "Password is required";
            else
              $password = test_input($_POST["password"]);

            if (empty($_POST["cnf_password"]))
                $cnf_passwordErr = "Password is required";
            else
                $cnf_password = test_input($_POST["cnf_password"]);

            // Name
            if (empty($_POST["name"]))
                $nameErr = "Name is required";
            else
                $name = test_input($_POST["name"]);

            // Location
            $location = $_POST['locations'];

            if ($location == "Empty")
                $locationErr = "Select Correct Location";
        }


        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
     ?>


    <body>
        <h1 align="center">Musical Hands</h1>
        <!-- <p>Begin Your Musical Journey From Here</p> -->
        <!-- <br><br> -->
        <div class="form-outline">
            <img src="avatar.png" class="avatar">
            <form method="post" class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Company/Business name <span class="error"> * <?php echo $nameErr;?> </span> <br> <input type="text" name="name" value="<?php echo $name;?>"><br><br>

                Email Id <span class="error"> *  <?php echo $usernameErr;?> </span> <br> <input type="text" name="username" value="<?php echo $username;?>"><br><br>

                Password <span class="error"> * <?php echo $passwordErr;?> </span> <br> <input type="password" name="password" id="pass" value="<?php echo $password;?>">
                <img src="eye1.png" alt="" id="eye_img" height="20px" onclick="myFunction()">
                <br><br>
                Confirm Password <span class="error"> * <?php echo $cnf_passwordErr;?> </span> <br> <input type="password" name="cnf_password" value="<?php echo $cnf_password;?>"><br><br>

                Your Location <span class="error"> * <?php echo $locationErr;?> </span> <br>
                <select name="locations">
                  <option value="Empty"> --- Select Location ---</option>
                  <option value="Mumbai">Mumbai</option>
                  <option value="Pune">Pune</option>
                  <option value="Delhi">Delhi</option>
                  <option value="Banglore">Banglore</option>
                  <option value="Chennai">Chennai</option>
                  <option value="Kolkata">Kolkata</option>
                </select> <br><br>

                PAN Card Number <span class="error"> * </span> <br> <input type="text" name="" value="">


                <input type="submit" name="submit" value="Sign Up">
                <br><br>
            </form>
        </div>


        <script>
            function myFunction() {
              var x = document.getElementById("pass");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }

              var img = document.getElementById("eye_img");
              if (img.getAttribute('src') == "eye1.png") {
                img.src = "eye2.png";
              } else {
                img.src = "eye1.png";
              }
            }
        </script>
    </body>
</html>


<?php
    if (isset($_POST['submit'])) {
        // $password = $_POST["password"];
        // $username = $_POST["username"];

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        // if ($nameErr != "")
        //     echo "<p style='color:red'>".$nameErr."</p>";

        if (strlen($password) < 8)
            $passwordErr = "Password should be at least 8 characters in length";
        elseif (!$uppercase)
            $passwordErr = "Password should include at least one upper case letter";
        elseif (!$lowercase)
            $passwordErr = "Password should include at least one lower case letter";
        elseif (!$number)
            $passwordErr = "Password should include at least one number";
        elseif (!$specialChars)
            $passwordErr = "Password should include at least one special character";
        elseif (strcmp($cnf_password, $password)!=0)
            $cnf_passwordErr = "Passwords do not match";
        elseif (strcmp($cnf_password, $password)==0)
            $passwordErr = "Strong password";


        $location = $_POST['locations'];

        if ($location == "Empty")
            $locationErr = "Select Correct Location";

    }
 ?>

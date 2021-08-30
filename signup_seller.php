<!DOCTYPE html>
<html>
    <head>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/signupSellerStyles.css">

    </head>

    <?php include 'php/signupSellerphp.php'; ?>

    <body>
        <div style="text-align: center;">
            <span style="font-size:30px;"><a style="text-decoration: none; color:black" href="index.php">Musical Hands</a></span><br>
        </div>

        <div class="form-outline">
            <div style="text-align: center;">
                <span style="font-size:20px;">Seller Signup</span>
            </div>
            <br>

            <img src="images/login/avatar.png" class="avatar">
            <form method="post" class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="text" name="name" placeholder="Company/Business name" value="<?php echo $name;?>"><br>
                <span class="error"><?php echo $nameErr;?> </span> <br>

                <input type="text" name="username" placeholder="Email Id" value="<?php echo $username;?>"><br>
                <span class="error"><?php echo $usernameErr;?> </span> <br>

                <div class="password">
                    <input type="password" name="password" placeholder="Password" id="pass" value="<?php echo $password;?>">
                    <img class="pass-img" src="images/login/eye1.png" alt="" id="eye_img" onclick="myFunction()">
                </div>

                <span class="error"><?php echo $passwordErr;?></span> <br>
                <input type="password" name="cnf_password" placeholder="Confirm Password" value="<?php echo $cnf_password;?>"><br>
                <span class="error"><?php echo $cnf_passwordErr;?> </span> <br>

                <select name="locations" style="color:#757575">
                  <option value="Empty"> --- Select Location ---</option>
                  <option value="Mumbai">Mumbai</option>
                  <option value="Pune">Pune</option>
                  <option value="Delhi">Delhi</option>
                  <option value="Banglore">Banglore</option>
                  <option value="Chennai">Chennai</option>
                  <option value="Kolkata">Kolkata</option>
                </select> <br>
                <span class="error"><?php echo $locationErr;?> </span> <br>

                <input type="text" name="gstin" placeholder="GSTIN Number" value="<?php echo $gstin;?>"><br>
                <span class="error">  <?php echo $gstinErr;?> </span>
                <span class="error"><?php echo $availabilityErr;?> </span> <br>

                <input type="submit" name="submit" value="Sign Up">
                <br><br>
            </form>
        </div>


        <script>
            function myFunction() {
              var x = document.getElementById("pass");
              if (x.type === "password")
                x.type = "text";
              else
                x.type = "password";


              var img = document.getElementById("eye_img");
              if (img.getAttribute('src') == "images/login/eye1.png")
                img.src = "images/login/eye2.png";
              else
                img.src = "images/login/eye1.png";

            }
        </script>
    </body>
</html>

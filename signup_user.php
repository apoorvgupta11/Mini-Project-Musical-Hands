<!DOCTYPE html>
<html>
    <head>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/signupUserStyles.css">
    </head>

    <?php include 'php/signupUserphp.php'; ?>

    <body>
        <div style="text-align: center;">
            <span style="font-size:30px;"><a style="text-decoration: none; color:black" href="index.php">Musical Hands</a></span><br>
        </div>
        <br>
        <div class="form-outline">
            <div style="text-align: center;">
                <span style="font-size:20px;">User Signup</span>
            </div>
            <br>

            <img src="images/login/avatar.png" class="avatar">
            <form method="post" class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="text" name="name" placeholder="Name" value="<?php echo $name;?>"><br>
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
                <span class="error"><?php echo $availabilityErr;?> </span>

                <input type="submit" name="submit" value="Sign Up">
                <br><br>

                <div class="text-light">
                    <a href="signup_seller.php" style="text-decoration:none;" onmouseover="this.style.color='#000'" onmouseout="this.style.color='#9b9b9b'">
                        Register as Seller ?
                    </a>
                </div>
                <br>

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

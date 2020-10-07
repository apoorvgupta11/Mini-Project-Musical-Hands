<!DOCTYPE html>
<html>
    <head>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/loginStyles.css">
    </head>

    <?php include 'php/loginphp.php'; ?>

    <body>
        <div style="text-align: center;">
            <span style="font-size:30px;">Musical Hands</span><br>
        </div>
        <br>
        <div class="form-outline">
            <div style="text-align: center;">
                <span style="font-size:20px;">Login</span>
            </div>
            <br>

            <img src="images/login/avatar.png" class="avatar">
            <form method="post" class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <input type="text" name="username" placeholder="Email Id" value="<?php echo $username;?>"><br>
                <span class="error"><?php echo $usernameErr;?> </span> <br>

                <div class="password">
                    <input type="password" name="password" placeholder="Password" id="pass" value="<?php echo $password;?>">
                    <img class="pass-img" src="images/login/eye1.png" alt="" id="eye_img" onclick="myFunction()">
                </div>
                <span class="error"><?php echo $passwordErr;?></span> <br>

                <input type="submit" name="submit" value="Sign in">
                <br><br>

                <div class="text-light">
                    <a href="" style="text-decoration:none;" onmouseover="this.style.color='#000'" onmouseout="this.style.color='#9b9b9b'">
                        Forgot password ?
                    </a>
                </div>

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

<?php
    $password = "";
    $username = "";
    $usernameErr = "";
    $passwordErr = "";
    $invalidErr = "";

    $passwordErrShow = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Username
        if (empty($_POST["username"]))
          $usernameErr = "* Username is required";
        else
          $username = test_input($_POST["username"]);

        // Password
        if (empty($_POST["password"]))
          $passwordErr = "* Password is required";
        else
          $password = test_input($_POST["password"]);
    }


    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


    if (isset($_POST['submit'])) {

        // Validate password
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (strlen($password) < 8)
            $passwordErr = "* Password should be minimum 8 characters.";
        elseif (!$uppercase)
            $passwordErr = "* Include at least one upper case letter.";
        elseif (!$lowercase)
            $passwordErr = "* Include at least one lower case letter.";
        elseif (!$number)
            $passwordErr = "* Include at least one number.";
        elseif (!$specialChars)
            $passwordErr = "* Include at least one special character.";
        else
            $passwordErr = "";

        if(!filter_var($username, FILTER_VALIDATE_EMAIL))
            $usernameErr = "* Invalid Username";


        // redirect to new page
        if ($passwordErr=="" && $usernameErr==""){

            $password = md5($password);             //md5 hashing

            $db = mysqli_connect('localhost','root','', 'mini_project') or die('Error in connect to MySQl Server');

            $username = stripcslashes($username);
            $password = stripcslashes($password);
            $username = mysqli_real_escape_string($db, $username);
            $password = mysqli_real_escape_string($db, $password);

            $query = "select *from user where username = '$username'";
            $result = mysqli_query($db, $query);

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $countUsername = mysqli_num_rows($result);

            $queryUsername = "select *from user where username = '$username'";
            $resultUsername = mysqli_query($db, $queryUsername);

            // $rowUsername = mysqli_fetch_array($resultUsername, MYSQLI_ASSOC);
            $countUsername = mysqli_num_rows($resultUsername);

            $queryBoth = "select *from user where username = '$username' and password = '$password'";
            $resultBoth = mysqli_query($db, $queryBoth);

            // $row = mysqli_fetch_array($resultBoth, MYSQLI_ASSOC);
            $countBoth = mysqli_num_rows($resultBoth);


            if($countUsername == 0 && $countBoth == 0){
                $invalidErr = "* User doesn't exists. Please Register First <a href='http://localhost/WP2/Mini%20Project/signup_user.php'> Here </a>";
            } else if($countUsername == 1 && $countBoth == 0){
                $invalidErr = "* Please Enter Correct Password";
            } else if ($countUsername == 1 && $countBoth ==1){
                $invalidErr = "";
                header('Location: http://localhost/WP2/Mini%20Project/helper_files/logincookie.php?&username='.$username);
            }

            mysqli_close($db);
        }
    }
 ?>

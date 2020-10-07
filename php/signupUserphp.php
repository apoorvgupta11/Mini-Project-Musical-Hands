<?php
    $name = "";
    $password = "";
    $cnf_password = "";
    $username = "";
    $nameErr = "";
    $usernameErr = "";
    $passwordErr = "";
    $cnf_passwordErr = "";


    $passwordErrShow = "";
    $cnf_passwordErrShow = "";


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

        if (empty($_POST["cnf_password"]))
            $cnf_passwordErr = "* Password is required";
        else
            $cnf_password = test_input($_POST["cnf_password"]);

        // Name
        if (empty($_POST["name"]))
            $nameErr = "* Name is required";
        else
            $name = test_input($_POST["name"]);

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
        elseif (strcmp($cnf_password, $password)!=0)
            $cnf_passwordErr = "* Passwords do not match.";
        elseif (strcmp($cnf_password, $password)==0)
            $passwordErr = "";

        if(!filter_var($username, FILTER_VALIDATE_EMAIL))
            $usernameErr = "* Invalid Username";


        // redirect to new page
        if ($passwordErr=="" && $cnf_passwordErr=="" && $usernameErr=="" && $nameErr==""){
            //header('Location: http://localhost/WP2/Mini%20Project/cookie.php?name='.$name.'&username='.$username.'&location='.$location);
            header('Location: http://localhost/WP2/Mini%20Project/login.php?');
            exit();
        }
    }
 ?>

<?php
    $password = "";
    $username = "";
    $usernameErr = "";
    $passwordErr = "";

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
            header('Location: http://localhost/WP2/Mini%20Project/helper_files/logincookie.php?&username='.$username);
            exit();
        }
    }
 ?>

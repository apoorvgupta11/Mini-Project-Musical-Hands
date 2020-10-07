<?php
    $name = "";
    $password = "";
    $cnf_password = "";
    $gstin = "";
    $username = "";
    $nameErr = "";
    $usernameErr = "";
    $passwordErr = "";
    $cnf_passwordErr = "";
    $locationErr = "";
    $gstinErr = "";
    $availabilityErr = "";

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

        // Location
        $location = $_POST['locations'];

        if ($location == "Empty")
            $locationErr = "* Select Correct Location";

        //GSTIN
        if (empty($_POST["gstin"]))
            $gstinErr = "* GSTIN Number is required";
        else
            $gstin = test_input($_POST["gstin"]);

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

        // GST
        $pattern = "/[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[0-9]{1}[A-Z]{1}[0-9]{1}/";
        $check = preg_match($pattern, $gstin);

        if (!$check)
            $gstinErr = "* Enter Valid GST Number";

        if(!filter_var($username, FILTER_VALIDATE_EMAIL))
            $usernameErr = "* Invalid Username";


        // redirect to new page
        if ($passwordErr=="" && $cnf_passwordErr=="" && $gstinErr=="" && $usernameErr=="" && $locationErr=="" && $nameErr==""){

            $password = md5($password);             //md5 hashing
            $uid = substr(uniqid(), 0, 10);         //unique id
            $db = mysqli_connect('localhost','root','', 'mini_project') or die('Error in connect to MySQl Server');

            // Check duplicate email
            $query = "select *from user where username = '$username'";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if($count != 0)
                $availabilityErr = "Username already Exists choose different username";
            else{
                $order = "INSERT INTO user(uid, name, username, password, type) VALUES ('$uid', '$name', '$username', '$password', 1)";
                $result = mysqli_query($db, $order);

                if($result)
                    header('Location: http://localhost/WP2/Mini%20Project/login.php');
                else
                    echo "<br/>Input data is fail<br/>";
            }

            mysqli_close($db);

        }
    }
 ?>

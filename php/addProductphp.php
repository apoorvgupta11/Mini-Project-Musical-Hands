<?php

    $name = "";
    $desc = "";
    $price = "";
    $quantity = "";
    $nameErr = "";
    $descErr = "";
    $priceErr = "";
    $quantityErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Name
        if (empty($_POST["name"]))
            $nameErr = "* Name is required";
        else
            $name = test_input($_POST["name"]);

        // desc
        if (empty($_POST["desc"]))
          $descErr = "* Description is required";
        else
          $desc = test_input($_POST["desc"]);

        // Category
        $category = $_POST["category"];
        // price
        if (empty($_POST["price"]))
            $priceErr = "* Price is required";
        else
            $price = test_input($_POST["price"]);

        // quantity
        if (empty($_POST["quantity"]))
          $quantityErr = "* Quantity is required";
        else
          $quantity = test_input($_POST["quantity"]);


    }


    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if (isset($_POST['submit'])) {

        if ($descErr=="" && $priceErr=="" && $quantityErr=="" && $nameErr==""){
            $uid = uniqid();
            $db = mysqli_connect('localhost','root','', 'mini_project') or die('Error in connect to MySQl Server');

            $order = "INSERT INTO product(product_id, name, category,description, price, quantity) VALUES ('$uid', '$name', '$desc', '$category','$price', '$quantity')";
            $result = mysqli_query($db, $order);

            if($result)
                header('Location: http://localhost/WP2/Mini%20Project/home.php');
            else
                echo "<br/>Input data is fail<br/>";

            mysqli_close($db);
        }
    }

 ?>

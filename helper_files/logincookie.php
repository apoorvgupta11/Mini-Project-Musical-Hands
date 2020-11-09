<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
            $username = "username";
            $username_value = $_GET['username'];

            $type = "type";
            $type_value = $_GET['type'];

            setcookie($username, $username_value, time()+60*30, "/");
            setcookie($type, $type_value, time()+60*30, "/");
        ?>
    </body>

    <script type="text/javascript">

    function getCookie(name) {
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      if (parts.length === 2)
        return parts.pop().split(';').shift();
    }

    var cookie = getCookie("type")

    if (cookie == 0 ){
        window.onload = function() {
            window.location.href = "http://localhost/WP2/Mini%20Project/home.php";
        }
    } else {
        window.onload = function() {
            window.location.href = "http://localhost/WP2/Mini%20Project/home_seller.php";
        }
    }


    </script>
</html>

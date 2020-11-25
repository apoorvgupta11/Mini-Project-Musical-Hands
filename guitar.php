<!DOCTYPE html>
<html >
    <head>
        <title>Musical Hands</title>

        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/instrument.css">

    </head>
    <?php session_start(); ?>

    <body>
        <p class="display-4 text-center pt-2"><a style="text-decoration: none; color:black" href="home.php">Musical Hands</a></p>
        <p class="text-center lead" >Start Your Musical Journey here</p>

        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-light navbar-color">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active ">
                        <a class="nav-link"  href="home.php">HOME <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            INSTRUMENTS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-center" href="guitar.php">Guitar</a>
                            <a class="dropdown-item text-center" href="keyboard.php">Keyboard</a>
                            <a class="dropdown-item text-center" href="wind.php">Flute</a>
                            <a class="dropdown-item text-center" href="drum.php">Drum</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"  href="books.php">BOOKS </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"  href="accessories.php">ACCESSORIES </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"  href="#">BLOG </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"  href="About.php">ABOUT US </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"  href="Contact.php">CONTACT US </a>
                    </li>

                    <?php if(isset($_SESSION['location']) && !empty($_SESSION['location'])){ ?>
                        <li class="nav-item active ">
                            <a class="nav-link" onclick="document.getElementById('modal-wrapper').style.display='block'"> <img src="images/placeholder.png" height="17px;" alt="No "> <?php echo $_SESSION['location']; ?> </a>
                        </li>
                    <?php } ?>
                </ul>


                <?php if(!isset($_COOKIE['username'])) { ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup_user.php">Register</a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                My Account
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">My Orders</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="helper_files/logoutcookie_session.php">Logout</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Cart</a>
                        </li>
                    </ul>
                <?php } ?>

            </div>
        </nav>

        <!-- Modal -->
        <div id="modal-wrapper" class="modal">
            <form class="modal-content animate" action="helper_files/location_session.php" method="post">
                <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp" style="margin-top:15px">&times;</span>
                <h4 style="text-align:center; margin-top:15px;">Enter your Location</h4>

                <br>
                <input type="text" name="location">
                <br>
                <input type="submit" name="submit" value="Save">
            </form>
        </div>


        <?php
            $db = mysqli_connect('localhost','root','', 'mini_project') or die('Error in connect to MySQl Server');
            $query = "SELECT * FROM product WHERE category = 'Guitar'";
            $result = mysqli_query($db, $query);
        ?>

        <br>
        <div class="row">
        <?php while($row = mysqli_fetch_assoc($result)) {  ?>
            <div class="col-md-2 mr-3 ml-3">
                <form method="post" action="cart.php?action=add&id=<?php echo $row["product_id"]; ?>" >
                    <div class="card shadow ml-5 pt-3" style="width: 15rem;">
                    <img class="card-img-top" src="<?php echo $row["image"]; ?>" alt="Not Found" onerror=this.src="images/keyboard/keyboard1.jpg" width="200px">
                    <div class="card-body">
                        <h5 class="card-title"> ₹<?php echo $row["price"];  ?> </h5>
                        <p class="card-text"><b> <?php echo $row["name"];  ?> </b> <br> <?php echo $row["description"];  ?> </p>
                        <div class="form-inline">
                            <span class="input-group-btn">
                                <input type="text" class="ml-0 mr-0" name="quantity" value="1" size="2">
                                <input type="submit" value="Add to Cart" class="btn btn-outline-primary ml-4 mr-0" />
                            </span>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        <?php } ?>
        </div>

        <!-- Card -->

        <br>
        <br>
        <div class="row">
            <div class="col-md-2 mr-3 ml-3">
                <div class="card shadow ml-5 pt-3" style="width: 15rem;">
                    <img class="card-img-top" src="images/guitar/guitar1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 17999</h5>
                        <p class="card-text">Zildjian Cymbals ZBT-Plus 40cm Splash</p>
                        <a href="cart.php" class="btn btn-outline-primary">Add To Cart</a>
                    </div>
                </div>
            </div>

            <div class="col-md-2 mr-3 ml-3">
                <div class="card shadow ml-5 pt-3" style="width: 15rem;">
                    <img class="card-img-top" src="images/guitar/guitar2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 17700</h5>
                        <p class="card-text">Gibson, Acoustic Electric Guitar</p>
                        <a href="cart.php" class="btn btn-outline-primary">Add To Cart</a>
                    </div>
                </div>
            </div>

            <div class="col-md-2 mr-3 ml-3">
                <div class="card shadow ml-5 pt-3" style="width: 15rem;">
                    <img class="card-img-top" src="images/guitar/guitar3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 23380</h5>
                        <p class="card-text">Gibson, Acoustic Electric Guitar</p>
                        <a href="cart.php" class="btn btn-outline-primary">Add To Cart</a>
                    </div>
                </div>
            </div>

            <div class="col-md-2 mr-3 ml-3">
                <div class="card shadow ml-5 pt-3" style="width: 15rem;">
                    <img class="card-img-top" src="images/guitar/guitar4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 47069</h5>
                        <p class="card-text">Epiphone, Electric Guitar, Les Paul </p>
                        <a href="cart.php" class="btn btn-outline-primary">Add To Cart</a>
                    </div>
                </div>
            </div>

            <div class="col-md-2 mr-3 ml-3">
                <div class="card shadow ml-5 pt-3" style="width: 15rem;">
                    <img class="card-img-top" src="images/guitar/guitar4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 47069</h5>
                        <p class="card-text">Epiphone, Electric Guitar, Les Paul </p>
                        <a href="cart.php" class="btn btn-outline-primary">Add To Cart</a>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <div class="row">
            <div class="col-md-2 mr-3 ml-3">
                <div class="card shadow ml-5 pt-3" style="width: 15rem;">
                    <img class="card-img-top" src="images/guitar/guitar1.jpg" alt="Card image cap" name="img_scr" value="images/guitar/guitar1.jpg">
                    <div class="card-body">
                        <h5 class="card-title">₹ 17999</h5>
                        <p class="card-text">Gibson, Acoustic Electric Guitar</p>
                        <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                    </div>
                </div>
            </div>

            <div class="col-md-2 mr-3 ml-3">
                <div class="card shadow ml-5 pt-3" style="width: 15rem;">
                    <img class="card-img-top" src="images/guitar/guitar2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 17700</h5>
                        <p class="card-text">Gibson, Acoustic Electric Guitar</p>
                        <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                    </div>
                </div>
            </div>

            <div class="col-md-2 mr-3 ml-3">
                <div class="card shadow ml-5 pt-3" style="width: 15rem;">
                    <img class="card-img-top" src="images/guitar/guitar3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 23380</h5>
                        <p class="card-text">Gibson, Acoustic Electric Guitar</p>
                        <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                    </div>
                </div>
            </div>

            <div class="col-md-2 mr-3 ml-3">
                <div class="card shadow ml-5 pt-3" style="width: 15rem;">
                    <img class="card-img-top" src="images/guitar/guitar4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 47069</h5>
                        <p class="card-text">Epiphone, Electric Guitar, Les Paul</p>
                        <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                    </div>
                </div>
            </div>

            <div class="col-md-2 mr-3 ml-3">
                <div class="card shadow ml-5 pt-3" style="width: 15rem;">
                    <img class="card-img-top" src="images/guitar/guitar3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 23380</h5>
                        <p class="card-text">Gibson, Acoustic Electric Guitar</p>
                        <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                    </div>
                </div>
            </div>
        </div>

    </body>


    <script type="text/javascript">

        <?php if(!isset($_SESSION['location']) && empty($_SESSION['location'])){ ?>
            window.onload(document.getElementById('modal-wrapper').style.display='block')
        <?php } ?>


        var modal = document.getElementById('modal-wrapper');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</html>

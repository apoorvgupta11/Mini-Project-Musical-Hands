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
        <link rel="stylesheet" href="css/home.css">

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
                        <a class="nav-link"  href="#">HOME <span class="sr-only">(current)</span></a>
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
                                <?php if(isset($_COOKIE['type']) && $_COOKIE['type'] == 1) { ?>
                                    <a class="dropdown-item" href="add_product.php">Add Product</a>
                                <?php } ?>

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

        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide ml-auto mr-auto" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/guitar.png" alt="First slide" >
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="images/trumpet.png" alt="First slide" >
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/keyboard.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/guitar2.png" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
        </div>

        <!-- Card -->
        <!-- Today's Deal -->
        <br>
        <div class="heading"> Today's Deal</div>
        <br>
        <!-- <div class="row">
            <div class="col-md-3">
                <div class="card shadow ml-5 pt-3" style="width: 19rem;">
                    <div class="todays_deal">Today's Deal</div>
                    <img class="card-img-top" src="images/guitar/guitar1.jpg" alt="Card image cap" name="img_scr" value="images/guitar/guitar1.jpg">
                    <div class="card-body">
                        <h5 class="card-title">₹ 17999</h5>
                        <p class="card-text">Gibson, Acoustic Electric Guitar, J-45 Studio -Antique Natural RS4SANN19</p>
                        <a href="cart.php" class="btn btn-outline-primary">Add To Cart</a>
                        <a href="#" class="btn btn-outline-warning ml-5">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow ml-5 pt-3" style="width: 19rem;">
                    <div class="todays_deal">Today's Deal</div>
                    <img class="card-img-top" src="images/guitar/guitar2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 17700</h5>
                        <p class="card-text">Gibson, Acoustic Electric Guitar, L-00 Studio -Antique Natural LSLSANN19</p>
                        <a href="cart.php" class="btn btn-outline-primary">Add To Cart</a>
                        <a href="#" class="btn btn-outline-warning ml-5">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow ml-5 pt-3" style="width: 19rem;">
                    <div class="todays_deal">Today's Deal</div>
                    <img class="card-img-top" src="images/guitar/guitar3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 23380</h5>
                        <p class="card-text">Gibson, Acoustic Electric Guitar,Humminbird, Walnut Burst AGHBWBN19</p>
                        <a href="cart.php" class="btn btn-outline-primary">Add To Cart</a>
                        <a href="#" class="btn btn-outline-warning ml-5">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow ml-5 pt-3" style="width: 19rem;">
                    <div class="todays_deal">Today's Deal</div>
                    <img class="card-img-top" src="images/guitar/guitar4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 47069</h5>
                        <p class="card-text">Epiphone, Electric Guitar, Les Paul Muse-Scarlett Red Metallic ENMLSRMNH1</p>
                        <a href="cart.php" class="btn btn-outline-primary">Add To Cart</a>
                        <a href="#" class="btn btn-outline-warning ml-5">Buy Now</a>
                    </div>
                </div>
            </div>
        </div> -->

        <?php
            $db = mysqli_connect('localhost','root','', 'mini_project') or die('Error in connect to MySQl Server');
            $query = "SELECT * FROM product ORDER BY RAND() LIMIT 4";
            $result = mysqli_query($db, $query);
        ?>

        <div class="row">
        <?php while($row = mysqli_fetch_assoc($result)) {  ?>
            <div class="col-md-3">
                <form method="post" action="cart.php?action=add&id=<?php echo $row["product_id"]; ?>" >
                    <div class="card shadow ml-5 pt-3" style="width: 19rem;">
                    <div class="todays_deal">Today's Deal</div>
                    <img class="card-img-top" src="<?php echo $row["image"]; ?>" alt="Not Found" onerror=this.src="images/keyboard/keyboard1.jpg" width="200px">
                    <div class="card-body">
	                    <h5 class="card-title"> ₹<?php echo $row["price"];  ?> </h5>
                        <!-- <h5 class="card-title"> ₹<?php echo "<s>".$row["price"]."</s>"; $dis = $row["price"]-($row["price"]*0.1); echo  " ₹" .$dis; ?> </h5> -->
	                    <p class="card-text"><b> <?php echo $row["name"];  ?> </b> <br> <?php echo $row["description"];  ?> </p>
                        <div class="form-inline">
                            <span class="input-group-btn">
                                <input type="text" class="ml-0 mr-0" name="quantity" value="1" size="2">
                                <input type="submit" value="Add to Cart" class="btn btn-outline-primary ml-5 mr-0" />
                            </span>
                        </div>
                    </div>
                    </div>
                </form>
            </div>

          <?php } ?>
        </div>

        <!-- New Arrivals -->
        <?php
            $db = mysqli_connect('localhost','root','', 'mini_project') or die('Error in connect to MySQl Server');
            $query = "SELECT * FROM product ORDER  BY timestamp DESC LIMIT 4";
            $result = mysqli_query($db, $query);
        ?>

        <br>
        <div class="heading"> New Arrivals</div>
        <br>
        <div class="row">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>

            <div class="col-md-3">
                <form method="post" action="cart.php?action=add&id=<?php echo $row["product_id"]; ?>" >
                    <div class="card shadow ml-5 pt-3" style="width: 19rem;">
                    <div class="new_arrivals">New Arrivals</div>
                    <img class="card-img-top" src="<?php echo $row["image"]; ?>" alt="Not Found" onerror=this.src="images/keyboard/keyboard1.jpg" width="200px">
                    <div class="card-body">
                        <h5 class="card-title"> ₹<?php echo $row["price"];  ?> </h5>
                        <p class="card-text"><b> <?php echo $row["name"];  ?> </b> <br> <?php echo $row["description"];  ?> </p>
                        <div class="form-inline">
                            <span class="input-group-btn">
                                <input type="text" class="ml-0 mr-0" name="quantity" value="1" size="2">
                                <input type="submit" value="Add to Cart" class="btn btn-outline-primary ml-5 mr-0" />
                            </span>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        <?php } ?>
        </div>

        <!-- <br>
        <div class="heading"> New Arrivals</div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow ml-5 pt-3" style="width: 19rem;">
                    <div class="todays_deal">Today's Deal</div>
                    <img class="card-img-top" src="images/guitar/guitar1.jpg" alt="Card image cap" name="img_scr" value="images/guitar/guitar1.jpg">
                    <div class="card-body">
                        <h5 class="card-title">₹ 17999</h5>
                        <p class="card-text">Gibson, Acoustic Electric Guitar, J-45 Studio -Antique Natural RS4SANN19</p>
                        <a href="cart.php" class="btn btn-outline-primary">Add To Cart</a>
                        <a href="#" class="btn btn-outline-warning ml-5">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow ml-5 pt-3" style="width: 19rem;">
                    <div class="todays_deal">Today's Deal</div>
                    <img class="card-img-top" src="images/guitar/guitar2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 17700</h5>
                        <p class="card-text">Gibson, Acoustic Electric Guitar, L-00 Studio -Antique Natural LSLSANN19</p>
                        <a href="cart.php" class="btn btn-outline-primary">Add To Cart</a>
                        <a href="#" class="btn btn-outline-warning ml-5">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow ml-5 pt-3" style="width: 19rem;">
                    <div class="todays_deal">Today's Deal</div>
                    <img class="card-img-top" src="images/guitar/guitar3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 23380</h5>
                        <p class="card-text">Gibson, Acoustic Electric Guitar,Humminbird, Walnut Burst AGHBWBN19</p>
                        <a href="cart.php" class="btn btn-outline-primary">Add To Cart</a>
                        <a href="#" class="btn btn-outline-warning ml-5">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow ml-5 pt-3" style="width: 19rem;">
                    <div class="todays_deal">Today's Deal</div>
                    <img class="card-img-top" src="images/guitar/guitar4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">₹ 47069</h5>
                        <p class="card-text">Epiphone, Electric Guitar, Les Paul Muse-Scarlett Red Metallic ENMLSRMNH1</p>
                        <a href="cart.php" class="btn btn-outline-primary">Add To Cart</a>
                        <a href="#" class="btn btn-outline-warning ml-5">Buy Now</a>
                    </div>
                </div>
            </div>
        </div> -->

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

        function addProd() {
            sessionStorage.SessionName = "SessionData";
            sessionStorage.getItem("SessionName");
            sessionStorage.setItem("SessionName","SessionData");
        }
    </script>
</html>

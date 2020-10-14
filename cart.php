<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/cartStyles.css">
    </head>


    <body>
        <p class="display-4 text-center pt-2"><a style="text-decoration: none; color:black" href="home.php">Musical Hands</a></p>
        <p class="text-center lead" >Your Cart</p>

        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-light navbar-color">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active ">
                        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <?php if(isset($_SESSION['location']) && !empty($_SESSION['location'])){ ?>
                        <li class="nav-item active ">
                            <a class="nav-link" onclick="document.getElementById('modal-wrapper').style.display='block'"> <img src="images/placeholder.png" height="17px;" alt="No "> <?php echo $_SESSION['location']; ?> </a>
                        </li>
                    <?php } ?>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>-->
                </ul>

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
                                <a class="dropdown-item" href="#">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="helper_files/logoutcookie_session.php">Logout</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Cart</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="helper_files/logoutcookie_session.php">Logout</a>
                        </li> -->

                    </ul>
                <?php } ?>
            </div>
        </nav>

        <!-- Cart Strip -->
        <div class="row">
            <div class="col-sm-1">
                <!-- Empty -->
            </div>
            <div class="col-sm-10">
                <div class="shoppingCart ">
                    <div class="item ">
                        <div class="row">
                            <div class="col-sm-1 mt-4" >
                                <div class="remove">
                                    <button class="btn btn-outline-danger" name="button">X</button>
                                </div>
                            </div>

                            <div class="col-sm-4" >
                                <img src="images/drums.jpg" alt="" height="100px">
                                <ImageHelper product={product}/>
                            </div>

                            <div class="col-sm-3">
                                <div class="description">
                                    <div> Music Title </div>
                                    <div class="">Music Description</div>
                                </div>
                            </div>

                            <!-- <div class="col-sm-3 d-flex justify-content-center">
                                <div class="row ">
                                        <button
                                            class="btn"
                                            onClick={() => {
                                                setCount(count-1);
                                                updateCart(product, count-1);
                                                setReload(!reload)  //to reload totalPrice
                                            }}
                                            disabled={count === 1}
                                            >-</button>
                                        <div class="count" >{cardCount}</div>
                                        <button
                                            class="btn"
                                            onClick={() => {
                                                setCount(count+1);
                                                updateCart(product, count+1);
                                                setReload(!reload)
                                            }}
                                            disabled={count === 10}
                                            >+</button>
                                </div>
                            </div> -->

                            <div class="col-sm-2  ">
                                <div class="totalPrice"> 656</div>
                            </div>
                        </div>
                    </div>
                </div>


            <p class="text-center">Bill</p>

            </div>

            <div class="col-sm-1">
                <!-- Empty -->
            </div>

        </div>


    </body>
</html>

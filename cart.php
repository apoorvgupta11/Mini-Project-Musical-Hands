<?php if(!isset($_COOKIE['username'])) {
		header("Location: http://localhost/WP2/Mini%20Project/login.php");
	}


	session_start();
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	if(!empty($_GET["action"])) {
		switch($_GET["action"]) {
			case "add":
				if(!empty($_POST["quantity"])) {
					$productById = $db_handle->runQuery("SELECT * FROM product WHERE product_id='" . $_GET["id"] . "'");

					$itemArray = array($productById[0]["product_id"]=>array('name'=>$productById[0]["name"], 'description'=>$productById[0]["description"], 'product_id'=>$productById[0]["product_id"], 'quantity'=>$_POST["quantity"], 'price'=>$productById[0]["price"], 'image'=>$productById[0]["image"]));

					if(!empty($_SESSION["project_cart"])) {
						if(in_array($productById[0]["product_id"],array_keys($_SESSION["project_cart"]))) {
							foreach($_SESSION["project_cart"] as $k => $v) {
									if($productById[0]["product_id"] == $k) {
										if(empty($_SESSION["project_cart"][$k]["quantity"])) {
											$_SESSION["project_cart"][$k]["quantity"] = 0;
										}
										$_SESSION["project_cart"][$k]["quantity"] += $_POST["quantity"];
									}
							}
						} else {
							$_SESSION["project_cart"] = array_merge($_SESSION["project_cart"],$itemArray);
						}
					} else {
						$_SESSION["project_cart"] = $itemArray;
					}
				}
			break;
			case "remove":
				if(!empty($_SESSION["project_cart"])) {
					foreach($_SESSION["project_cart"] as $k => $v) {
							if($_GET["id"] == $k)
								unset($_SESSION["project_cart"][$k]);
							if(empty($_SESSION["project_cart"]))
								unset($_SESSION["project_cart"]);
					}
				}
			break;
			case "empty":
				unset($_SESSION["project_cart"]);
			break;
		}
	}
?>


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
        <p class="display-4 text-center pt-2"><a style="text-decoration: none; color:black" href="index.php">Musical Hands</a></p>
        <p class="text-center lead" >Your Cart</p>

        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-light navbar-color">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active ">
                        <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
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
                        <a class="nav-link"  href="blog.php">BLOG </a>
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
                                <!-- <a class="dropdown-item" href="#">My Orders</a> -->
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

        <?php //print_r($_SESSION); ?>

        <!-- <a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a> -->

        <!-- Cart Strip -->
        <div class="row">
            <div class="col-sm-1"> <!-- Empty --> </div>

            <div class="col-sm-10">
				<h3 style="margin-left:500px"> Product &emsp;&emsp; Qty. &emsp; Unit Price &emsp;&emsp; Price</h3>
                <div class="shoppingCart ">
                    <?php
                        if(isset($_SESSION["project_cart"])){
                            $total_quantity = 0;
                            $total_price = 0;

                            foreach ($_SESSION["project_cart"] as $item){
                                $item_price = $item["quantity"]*$item["price"];
                    ?>

                    <div class="item">
                        <div class="row">
                            <div class="col-sm-1 mt-4">
                                <div class="remove">
                                    <a href="cart.php?action=remove&id=<?php echo $item["product_id"]; ?>" class="btn btn-outline-danger">X</a>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <img src="<?php echo $item["image"]; ?>" alt="Not Found" onerror=this.src="images/keyboard/keyboard1.jpg" height="100px">
                            </div>

                            <div class="col-sm-2">
                                <div class="description">
                                    <div> <?php echo $item["name"]; ?> </div>
                                    <div class=""><?php echo $item["description"]; ?></div>
                                </div>
                            </div>

                            <div class="col-sm-1">
                                <div class="totalPrice"> <?php echo $item["quantity"]; ?> </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="totalPrice"> <?php echo "₹".$item["price"]; ?></div>
                            </div>

                            <div class="col-sm-2">
                                <div class="totalPrice"> <?php echo "₹". number_format($item_price,2); ?></div>
                            </div>

                        </div>
                    </div>

                    <?php
                            $total_quantity += $item["quantity"];
                            $total_price += ($item["price"]*$item["quantity"]);
                        }
                    ?>

                </div> <br>

                Total Quantity: <?php echo $total_quantity; ?> <br><br>
                Total Amount  : <h3 class="ml-auto"> <?php echo "₹".number_format($total_price, 2); ?> </h3>

				<!-- <a id="btnEmpty" href="cart.php?action=empty" >Checkout</a> -->

				<a id="btnEmpty" href="cart.php?action=empty" onclick="document.getElementById('modal-checkout').style.display='block'">Checkout </a>

				<div id="modal-checkout" class="modal">
	                <span onclick="document.getElementById('modal-checkout').style.display='none'" class="close" title="Close PopUp" style="margin-top:15px">&times;</span>
	                <h4 style="text-align:center; margin-top:15px;">Order Booked</h4> <br>
	                <input type="submit" name="submit" value="Ok">
		        </div>

                <?php } else { ?>
                <div class="no-records">Your Cart is Empty</div>
                <?php } ?>
            </div>

            <div class="col-sm-1"><!-- Empty --></div>

        </div>
    </body>
	<script type="text/javascript">
	var modalC = document.getElementById('modal-checkout');
	window.onclick = function(event) {
		if (event.target == modalC) {
			modal.style.display = "none";
		}
	}
	</script>
</html>

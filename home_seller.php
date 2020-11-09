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
        <link rel="stylesheet" href="css/homeSellerStyles.css">

    </head>
    <body>
        <p class="display-4 text-center pt-2">Seller Page</p>
        <p class="text-center lead" >Add Product</p>


        <div class="col-md-8 offset-md-2 ">
            <form>
                <span>Add Photo</span>
                <div class="form-group pt-2">
                    <label class="btn btn-block btn-success">
                        <input type="file" name="photo" accept="image" placeholder="choose a file"/>
                    </label>
                </div>
                <div class="form-group">
                    <input class="form-control pt-4 pb-4 " type="text" placeholder="Name" />
                </div>
                <div class="form-group">
                    <input class="form-control pt-4 pb-4" type="text" placeholder="Description"/>
                </div>
                <div class="form-group">
                    <input class="form-control pt-4 pb-4" type="number" placeholder="Price" />
                </div>
                <div class="form-group">
                    <input class="form-control pt-4 pb-4" type="number" placeholder="Quantity"  />
                </div>
                <button class="btn btn-outline-primary mb-3 text-large" type="submit">Create Product</button>

            </form>
        </div>

    </body>
</html>

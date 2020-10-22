<?php
// Starts the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	   <title>BOOKSTORE </title>
	   <link href="css/styles.css" rel="stylesheet" />
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
	   <link href="css/style.css" rel="stylesheet" />
   </head>
<body>
<nav class="navbar navbar-dark bg-dark">
	<a class="navbar-brand" href="index.html">
	  <img src="images/book.svg" width="30" height="30" class="d-inline-block align-top" alt="">
	  Book Store
	</a>
  </nav>
    <div class="jumbotron">
        <h1 class="text-center display-4">Book List</h1>
    </div>
    <div class="container">
        <?php
        require('mysqli_connect.php');
        $sql = mysqli_query($conn, "SELECT * FROM inventory");
// product details from inventory
        $id = 'id';
        $name = 'book_name';
        $desc = 'book_author';
        $price = 'price';
        $quantity = 'quantity';
        $image = 'image';
        $form = "<div class='container'>";
        if(mysqli_num_rows($sql) > 0) {
// fetching data from database
            while($row = mysqli_fetch_array($sql)) {
                $id = $row['id'];
                $name = $row['book_name'];
                $desc = $row['book_author'];
                $quantity = $row['quantity'];
                $price = $row['price'];
                $image = $row['image'];

                $form .= "<div class='container'>
                <div class='card-group vgr-cards'>
                  <div class='card'>
                    <div class='card-img-body'>
                      <img class='card-img' src=$image>
                    </div>
                    <div class='card-body'>
                      <h4 class='card-title'>$name</h4>
                      <p class='card-text'><b>Author: </b>$desc</p>
                      <p class='card-text'><b>Price: </b>$price</p>
                      <a href='confirmation.php?pid=$id' class='btn btn-outline-primary'>Buy</a>
                    </div>
                  </div>
                </div>
              </div>
            ";
            }
            echo $form;
        }
        ?>
    </div>
</body>
</html>



<!-- 
<div class='card mb-3'>
                <img class='card-img-top' src=$image alt='Card image cap' style='height=500px'>
                <div class='card-body'>
                  <h5 class='card-title'>$name</h5>
                  <p class='card-text'>$price</p>
                  <p class='card-text'><small class='text-muted'>$quantity</small></p>
                  <p class='card-text'><small class='text-muted'>$desc</small></p>
                  <a href='confirmation.php?pid=$id' class='card-link'>BUY</a>
                </div>
              </div>

<div class='card' style='width: 18rem;'>
                <img class='card-img-top' src=$image alt='Card image cap'>
                <div class='card-body'>
                  <h5 class='card-title'>$name</h5>
                  <h6>Price :$price</h6>
                  <p class='card-text'><b>Quantity:</b>$quantity</p>
                </div>
                <div class='card-body'>
                <a href='confirmation.php?pid=$id' class='card-link'>BUY</a>
                </div>
            </div>
            </div> --> -->
<!-- <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"></h5>
    <h6>Price :</h6>
    <p class="card-text"><b>Quantity:</b></p>
  </div>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
  </div>
</div> -->


<!-- //	<a class='btn btn-primary btn-lg' href='confirmation.php?pid=$id'>Buy</a>
												</div><br>
											</div> -->
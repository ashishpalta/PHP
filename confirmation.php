<?php
    require('mysqli_connect.php');
	$error = array();
    if(isset($_GET['pid'])) {

		$pid = '';
        $pname = '';
        $pprice = '';
        $pimg = '';

		$pid = $_GET['pid'];

// form query
		$db_form_query = mysqli_query($conn, "SELECT * FROM inventory WHERE id = $pid");
		$db_form_query_results = mysqli_fetch_array($db_form_query);
        $pname = $db_form_query_results['book_name'];
		$pprice = $db_form_query_results['price'];
		$pimg = $db_form_query_results['image'];
	}

    if(isset($_POST['submit']))
    {
		// values posted with form
    	$firstname = $_POST['firstname'];
    	$lastname = $_POST['lastname'];
    	$address = $_POST['address'];
    	$payment = $_POST['payment'];
		
		// form validation for all values
		if(empty($firstname) || strlen($firstname) == 0) {
 			array_push($error, "Please enter your firstname<br>");
    	} else {
        	$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
   		}
		if(empty($lastname) || strlen($lastname) == 0) {
 			array_push($error, "Please enter your lastname<br>");
    	} else {
        	$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
   		}
		if(empty($address) || strlen($address) == 0) {
 			array_push($error, "Please enter your address<br>");
   		} else {
       		$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    	}
		if(empty($payment) || strlen($payment) == 0) {
			array_push($error, "Please choose a payment method <br>");
		} else {
			$payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
		}
		$productID = $_POST['id'];

	 	if(empty($error))
	 	{
            
	 		$insert = mysqli_query($conn,"INSERT INTO users VALUES ('','$firstname','$lastname','$address','$payment')");

	 		$query = mysqli_query($conn, "SELECT * FROM inventory WHERE id = $productID");
	 		$details = mysqli_fetch_array($query);
	 		$quantity = $details['quantity'];

	 		$newQuantity = $quantity - 1;

	 		$update = mysqli_query($conn,"UPDATE inventory SET quantity = '$newQuantity' WHERE id='$productID'");

	 		header("Location: success.php");
	 	}else{
	 		foreach ($error as $key => $value) {
	 			echo $value;
	 		}
		}
	}

 ?>

<!DOCTYPE html>
<html>
<head>
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
	<a class="navbar-brand" href="#">
	  <img src="images/book.svg" width="30" height="30" class="d-inline-block align-top" alt="">
	  Book Store
	</a>
  </nav>

 <div class='confirmation col-sm-12'>
	 <!-- html form to get details -->
 	<div class='form container'>
 		<form class="form-horizontal" action='confirmation.php' method='post'>

            <div class="form-group">
                <div class="offset-sm-2 col-sm-6 text-center">
                    <img src="<?php echo $pimg; ?>" style="height: 30%; width: 30%;">
                </div>
            </div>

 			<div class="form-group">
			    <label class="control-label col-sm-2">Product Name:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="<?php echo $pname; ?>" readonly>
			    </div>
			 </div>

 			<div class="form-group">
			    <label class="control-label col-sm-2">Product Price:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="<?php echo $pprice; ?>" disabled="disabled">
			    </div>
			 </div>

			 <div class="form-group">
			    <label class="control-label col-sm-2">First Name:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']?>" name="firstname">
			    </div>
			 </div>

			 <div class="form-group">
			    <label class="control-label col-sm-2">Last Name:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="" name="lastname">
			    </div>
			 </div>

			 <div class="form-group">
			    <label class="control-label col-sm-2">Address:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="" name="address">
			    </div>
			 </div>

 			<div class="form-group">
 				<label class="control-label col-sm-2">Payment:</label>
 				 <div class="col-sm-6">
			      <select name="payment" class="form-control">
					<option value="Credit Card">Credit Card</option>
					<option value="Debit Card">Debit Card</option>
					<option value="Cash on Delivery">Cash On Delivery</option>
				  </select>
				 </div>
			</div>

			<input type="hidden" name="id" value="<?php echo $pid; ?>">

            <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-6">
			      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
			    </div>
			</div>

 		</form>
 	</div>
 </div>
</body>
</html>

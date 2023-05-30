<?php
if (session_start()) {
	if (!$_SESSION['loginStatus']) {
		if(!isset($_COOKIE['logindata'])){
			header('Location: ./admin.php');
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload</title>
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://kit.fontawesome.com/581bb64942.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="./assets/css/upload.scss">
	<link rel="stylesheet" href="../assets/css/navbar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/581bb64942.js" crossorigin="anonymous"></script>
</head>

<body>
	<!-- importing navbar -->
	<?php
	include "components/navbar.php";
	?>
	<div class="container">

		<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
			<div class="form-row">
				<div class="col-md-4 mb-3 h4">
					<label for="validationServer01" class="h3 font-weight-bold">Product ID</label>
					<input name="productId" type="number" class="form-control is-valid" style="font-size: 1.5rem;" id="" placeholder="Product ID" required>
				</div>
				<div class="col-md-4 mb-3 h4">
					<label for="validationServer02" class="h3 font-weight-bold">Product Name</label>
					<input name="productName" type="text" class="form-control is-valid " style="font-size: 1.5rem;" id="validationServer02" placeholder="Product Name" required>
				</div>
				<div class="col-md-4 mb-3 h4">
					<label for="validationServer03" class="h3 font-weight-bold">Price</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" style="font-size: 1.5rem;">₹</span>
						</div>
						<input name="productPrice" type="text" class="form-control" style="font-size: 1.5rem;" aria-label="Amount (to the nearest Rupee)" required>
						<div class="input-group-append">
							<span class="input-group-text" style="font-size: 1.5rem;">.00</span>
						</div>
					</div>
				</div>
				<form class="was-validated">
			</div>
			<div class="form-group mt-1">
				<label for="exampleFormControlTextarea1" class="h3 mt-1 font-weight-bold">Category</label>
				<select name="productCat" class="custom-select custom-select-lg mb-3" style="font-size: 1.5rem;" required>
					<option value="">None</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
					<option value="kids">Kids</option>
				</select>
			</div>

			<div class="form-group mt-1">
				<label for="exampleFormControlTextarea1" class="h3 font-weight-bold">Description</label>
				<textarea name="productDesc" class="form-control" style="font-size: 1.5rem;" id="exampleFormControlTextarea1" rows="3"></textarea>
			</div>

			<div>
				<label for="formFileLg" class="form-label mt-1 font-weight-bold h3">Product Image</label>
				<input name="productImg" accept="image/jpeg,image/png,image/webp,image/jpg"  class="form-control form-control-lg" id="formFileLg" type="file">
			</div>

			<div class="custom-control custom-checkbox mb-3 mt-4 h4">
				<input name="confirm" value="confirm" type="checkbox" class="custom-control-input" id="customControlValidation1" required>
				<label class="custom-control-label" for="customControlValidation1">Check me to confirm adding the product.</label>
			</div>

			<button class="btn btn-outline-success mb-3 btn-lg" type="submit">Submit </button>
		</form>
	</div>

	<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		include "conn.ini.php";

		if (!$conn) { ?>
			<div class="alert showPopUp error">
				<h3>Unable to reach servers</h3>
			</div>
			<?php
		} else {

			$productId = (int)$_POST['productId'];
			$productName = $_POST['productName'];
			$productPrice = (int)$_POST['productPrice'];
			$productCat = $_POST['productCat'];
			$productDesc = $_POST['productDesc'];
			$productImage = $_FILES['productImg'];
			$productImageUrl = $productImage['name'];
			$confirm = $_POST['confirm'];

			if ($confirm == 'confirm') {
				$sql = "INSERT INTO products VALUES($productId, '$productName', $productPrice, '$productCat', '$productDesc', '$productImageUrl')";
				if ($conn->query($sql)) {
					$conn->close();
					move_uploaded_file($productImage["tmp_name"], '../products/' . $productCat . '/' . $productImage['name']);
			?>
					<div class="alert showPopUp">
						<h3>Product Upload Sucess</h3>
					</div>
				<?php
				} else {
				?>
					<div class="alert showPopUp error">
						<h3>Unable to reach servers</h3>
					</div>
				<?php

				}
			} else { ?>
				<div class="alert showPopUp error">
					<h3>Please confirm your inputs first</h3>
				</div>
		<?php
			}
		}
	}
	?>
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
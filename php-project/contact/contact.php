<?php
$p = (int)$_REQUEST['p'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./contact/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./contact/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./contact/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./contact/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./contact/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./contact/cont_css/util.css">
	<link rel="stylesheet" type="text/css" href="./contact/css/main.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" href="./stylesheet/loader.css">
</head>

<body>
	<?php
	include './components/loader.php';
	include_once './components/navbar.php';
	?>
	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="./contact/images/img-01.png" alt="IMG">
			</div>

			<form class="contact1-form validate-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
				<span class="contact1-form-title">
					Get in touch
				</span>

				<div class="wrap-input1 validate-input" data-validate="Name is required">
					<input class="input1" type="text" name="name" placeholder="Name">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate="Valid email is required: ex@abc.xyz">
					<input class="input1" type="email" name="email" placeholder="Email">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate="Subject is required">
					<input class="input1" type="number" name="mobile" placeholder="mobile">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate="Message is required">
					<textarea class="input1" name="message" placeholder="Message"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<input type="submit" class="contact1-form-btn" value="Send Response"></input>
				</div>
			</form>
		</div>
	</div>


	<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		include "./misc/conn.ini.php";
		$popDialouge = '<div class="popupMessage" id="popUp">
		<div class="popUp">
			<span>Message not sent</span>
			<button class="btn btn-danger" onclick="hidePopup()">Ok</button>
		</div>
	</div>


	<script>
		const popup = document.getElementById("popUp");

		function hidePopup() {
			popup.style.display = "none";
		}
	</script>';

		if (!$conn) {
			echo $popDialouge;
		} else {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$mobile = (int)$_POST['mobile'];
			$message = $_POST['message'];

			$sql = "INSERT INTO inqiryProduct (productId, name, mobile, email, query) VALUES (?,?,?,?,?)";
			$smtm = $conn->prepare($sql);
			$smtm->bind_param("isiss", $p, $name, $mobile, $email, $message);

			if ($smtm->execute()) {
	?>
				<div class="popupMessage" id="popUp">
					<div class="popUp">
						<span>Message sent</span>
						<button class="btn btn-danger" onclick="hidePopup()">Ok</button>
					</div>
				</div>


				<script>
					const popup = document.getElementById("popUp");

					function hidePopup() {
						console.log('hide')
						popup.style.display = "none";
					}
				</script>

	<?php
			} else {
				echo $popDialouge;
			}
		}
	}

	?>

	<!--===============================================================================================-->
	<script src="./contact/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="./contact/vendor/bootstrap/js/popper.js"></script>
	<script src="./contact/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="./contact/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="./contact/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>

	<!--===============================================================================================-->
	<script src="./contact/js/main.js"></script>

</body>

</html>
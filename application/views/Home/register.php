<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="templateRegister/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templateRegister/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templateRegister/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templateRegister/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templateRegister/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templateRegister/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templateRegister/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templateRegister/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templateRegister/css/util.css">
	<link rel="stylesheet" type="text/css" href="templateRegister/css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100" style="background-color: black;">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Register :
				</span>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="email" placeholder="Enter your email address">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 input100-select">
					<span class="label-input100">Team</span>
					<div>
						<select class="selection-2" name="service">
							<option>Team 1</option>
							<option>Team 2</option>
							<option>Team 3</option>
							<option>Team 4</option>
							<option>Team 5</option>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" >
					<span class="label-input100">Login</span>
					<input class="input100" type="text" name="email" placeholder="Enter your login">
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" >
					<span class="label-input100">Password</span>
					<input class="input100" type="password" name="email" placeholder="Enter your password">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" >
					<span class="label-input100">Password confirmation</span>
					<input class="input100" type="password" name="email" placeholder="Confirm your password>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="templateRegister/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="templateRegister/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="templateRegister/vendor/bootstrap/js/popper.js"></script>
	<script src="templateRegister/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="templateRegister/vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="templateRegister/vendor/daterangepicker/moment.min.js"></script>
	<script src="templateRegister/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="templateRegister/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="templateRegister/js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>

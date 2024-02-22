<?php
	session_start();
	include "../SQL_connect/connect_db.php";

	if(isset($_POST['submit'])) {
		$email = $_POST['email']; 
		$password = $_POST['password'];

		if(empty($email)) {
			echo "<script>alert('Write Email');</script>";
		}   else if(empty($password)){
			echo "<script>alert('Write password');</script>";
		} else {
			$sql = "SELECT * FROM `employees` WHERE email = '$email' AND password = '$password'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);
			if($count==1) {
			  $_SESSION['image'] = $row['image'];
			  $_SESSION['ID'] = $row['id'];
				header("Location: ../Pages/employees.php");
			} else {
				echo "<script>
						alert('Wrong Email or Password');
					</script>";
			}
		}
	}
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
	<script src="https://unpkg.com/scrollreveal"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/signIn.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../css/images/img-01.png" alt="IMG">
				</div>
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Login For Employee
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input required class="input100" value="<?= isset($_POST['email']) ? $_POST['email'] : null; ?>" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input required class="input100" value="<?= isset($_POST['password']) ? $_POST['password'] : null; ?>" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button name="submit" class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-136">
						<a class="txt2" href="director.php">
							I am Director
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
        ScrollReveal({
            reset: true,
            distance: '60px',
            duration: 2500,
			delay: 0,
            opacity: 0
        })
        ScrollReveal().reveal('.login100-form-title', { origin : 'left'});
		ScrollReveal().reveal('.login100-pic', { origin : 'left'});
		ScrollReveal().reveal('.wrap-input100', {origin : 'top'});
		ScrollReveal().reveal('.container-login100-form-btn', {origin : 'bottom'});
		ScrollReveal().reveal('.text-center', {origin : 'bottom'});
    </script>
</body>
</html>
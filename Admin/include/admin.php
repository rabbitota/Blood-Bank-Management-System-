<?php 

	//include header file
	include ('include/header.php');
	

	if(isset($_POST['SignIn'])){
		//email input check
		if(isset($_POST['email']) && !empty($_POST['email'])){
			$email = $_POST['email'];
		}else{
			$emailError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please fill the email field.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>';
		}

		//Password input check
		if(isset($_POST['password']) && !empty($_POST['password'])){
			$password = $_POST['password'];
		}else{
			$passwordError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please fill the password field.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>';
		}

		//Login Query
		if(isset($email) && isset($password)){
			$sql = "SELECT * FROM admin WHERE password='$password' && email='$email'";
			$result = mysqli_query($connection,$sql);
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['save_life_date'] = $row['save_life_date'];
					$_SESSION['who'] = "admin";
					header('location: index.php');
				}
			}else{
				$submitError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Sorry! No Record Found.Please enter valid email or password.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
			}
		}
	}

?>

<?php 

 ?>

<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
	*{
    	font-family: 'Poppins',sans-serif;
	}
	.size{
		min-height: 0px;
		padding: 60px 0 60px 0;

	}
	h1{
		color: white;
	}
	.form-group{
		text-align: left;
	}
	h3{
		color: #e74c3c;
		text-align: center;
	}
	.red-bar{
		width: 25%;
	}
	.form-container{
		background-color: white;
		border: .5px solid #eee;
		border-radius: 5px;
		padding: 20px 10px 20px 30px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
-moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
	}
</style>
<div class="container-fluid red-background size">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h1 class="text-center">Admin Login</h1>
			<hr class="white-bar">
		</div>
	</div>
</div>

<div class="conatiner size ">
	<div class="row">
		<div class="col-md-6 offset-md-3 form-container">
		<h3>Admin Login</h3>
		<hr class="red-bar">
		<?php if(isset($submitError)) echo $submitError; ?>
		<!-- Erorr Messages -->

			<form action="" method="post" >
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" placeholder="Email" required>
					<?php if(isset($emailError)) echo $emailError; ?>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" placeholder="Password" required class="form-control">
					<?php if(isset($passwordError)) echo $passwordError; ?>
				</div>
				<div class="form-group">
					<button class="btn btn-danger btn-lg center-aligned" type="submit" name="SignIn">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php include 'include/footer.php' ?>
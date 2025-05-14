<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$postcode = $_POST['postcode'];
		$country = $_POST['country'];


		if(!empty($user_name) && !empty($password) && !empty($fullname) && !empty($email) && !empty($gender) && !empty($address) && !empty($city) && !empty($postcode) && !empty($country) &&  !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password,fullname,email,gender,address,city,postcode,country) values ('$user_id','$user_name','$password','$fullname','$email','$gender','$address','$city','$postcode','$country')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<?php
$profpic = "myPicture4.jpg";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
    body {
	background-image: url('<?php echo $profpic;?>');
	}

	</style>
   

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name" placeholder="Username"><br><br>
			<input id="text" type="password" name="password" placeholder="Password"><br><br>
			<input id="text" type="text" name="fullname" placeholder="Full Name"><br><br>
			<input id="text" type="text" name="email" placeholder="Email"><br><br>
			<input id="text" type="text" name="gender" placeholder="Gender"><br><br>
			<input id="text" type="text" name="address" placeholder="Address"><br><br>
			<input id="text" type="text" name="city" placeholder="City"><br><br>
			<input id="text" type="text" name="postcode" placeholder="Post Code"><br><br>
			<input id="text" type="text" name="country" placeholder="Country"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>
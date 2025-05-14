<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>
<?php
$profpic = "myPicture2.jpg";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<link rel="stylesheet" href="./login.css">
 
 <style type="text/css">

body {
background-image: url('<?php echo $profpic;?>');
background-size: cover;

}
	#box{

		background-color: salmon;
	}
</style>

</head>
<body>
	<div id="box">
		
		<h1>JUSTSOURCEIT.COM</h1>

		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login:</div>

			<input id="text" type="text" name="user_name" placeholder="Username"><br><br>
			<input id="text" type="password" name="password" placeholder="Password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
       <p style="text-align:center; color:lightblue;">1.SOLEHDUDIN YUSUF BIN SALLEHUDIN IRWAN 22005845</p>
       <p style="text-align:center; color:lightblue;">2.FARHAN BIN IZAM FAIRUS 22006657</p>
       <p style="text-align:center; color:lightblue;">3.AHMAD SHAHMI BIN MOHD ISA 22007598</p>
       <p style="text-align:center; color:lightblue;">4.SYED HADIFF HAIQAL BIN SYED EDDY ASRUL 22012101</p>
       <p style="text-align:center; color:lightblue;">5.ZULAIKHA NURIRDYNA BINTI ZAKIR ALI 22005574</p>
       <p style="text-align:center; color:lightblue;">6.NUR ASHSYEEFA ILLANDA BINTI ABDUL KAMAL 22003195</p>
       <p style="text-align:center; color:lightblue;">7.NUR SORFINA BINTI ROSLI 22005705</p>
       <p style="text-align:center; color:lightblue;">8.ALISYA SOFEA BINTI AZMI HARISS 22006487</p>
</body>
</html>
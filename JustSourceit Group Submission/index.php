<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
<link rel="stylesheet" href="index.css">
</head>
<body>
	<a href="logout.php">Logout</a>
	<h1 id="myHeader">Homepage</h1>

	<br>
	Welcome,
	<?php echo $user_data['user_name']; ?>
 <table style="border:4px solid gold" align="center">
 	<h1 style="color:red;" align="center"><i>Personal Details:<i></h1>
 	<thead style="background-color:gold;">
 		<tr>
 			<th>Full Name</th>
 			<th>Email</th>
 			<th>Gender</th>
 			<th>Address</th>
 			<th>City</th>
 			<th>PostCode</th>
 			<th>Country</th>
 		</tr>
 	</thead>
    <tbody style="background-color:grey;">
    	<tr>
    		<td><?php echo $user_data['fullname']; ?></td>
    		<td><?php echo $user_data['email']; ?></td>
    		<td><?php echo $user_data['gender']; ?></td>
    		<td><?php echo $user_data['address']; ?></td>
    		<td><?php echo $user_data['city']; ?></td>
    		<td><?php echo $user_data['postcode']; ?></td>
    		<td><?php echo $user_data['country']; ?></td>
    	</tr>
    </tbody>
 </table>
 <!-- JavaScript Button -->
    <div class="button-container">
        <button onclick="window.location.href='index2.php'" id="button" style="background-color:violet">TopupCard</button>
        <button onclick="window.location.href='search.php'" id="button2" style="background-color:#329dd5">BdnaashUTP</button>
        <button onclick="window.location.href='addtocart.html'" id="button3" style="background-color:lightgreen">Shopping</button>
    </div>
</body>
</html>
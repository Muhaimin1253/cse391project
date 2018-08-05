<?php
   
	$db = mysqli_connect("localhost", "root", "", "dbinfo") or die("Not connected");
     
     if(isset($_POST['confirm'])){
	    $name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$gamename = $_POST['gamename'];
	    $payment = $_POST['cash']; 
		$quantity = $_POST['quantity'];
			$sql="INSERT INTO registration(name, email, address, contact, gamename, payment, Quantity) VALUES('$name', '$email', '$address', '$contact','$gamename', '$payment','$quantity'  )";
			mysqli_query($db,$sql);
			echo 'Your purchase has been registered';
		
	 }

	if(isset($_GET['amount'])){
			$amount = $_GET['amount'];
			$gname = $_GET['name'];
			
	}
	if(!(isset($_GET['amount']) or isset($_POST['confirm']))){
		header("location: index.php");
	}	 
	
?>	





<!doctype html>
<html>
<head>
<title>Registration</title>
<link rel = "stylesheet" type ="text/css" href="style.css">
</head>
<body>
<div class = "header">
<h1>Register & Buy Now !</h1>
<p>You are just a few steps away ! Fill up and confirm :)</p>
</div>

<form method="post" action="register.php">
   <table>
       <tr>
            <td>Name:</td>
             <td><input type="text" name="name" class="textInput"></td>  
       
        </tr>
		
		<tr>
            <td>Email:</td>
             <td><input type="email" name="email" class="textInput"></td>  
       
        </tr>
		<tr>
            <td>Address:</td>
             <td><input type="text" name="address" class="textInput"></td>  
       
        </tr>
		<tr>
            <td>Contact:</td>
             <td><input type="text" name="contact" class="textInput"></td>  
       
        </tr>
		<tr>
            <td>GameName:</td>
             <td><input type="text" readonly  name="gamename" value="<?php if(isset($gname)) echo $gname;?>" class="textInput"></td>  
       
        </tr>
		<tr>
            <td>Payment:</td>
			<br />
			
             <td><input type="text" readonly name="cash" value="<?php if(isset($amount)) echo $amount;?>" class="textInput"></td>     
        </tr>
		<tr>
            <td>Quantity:</td>
             <td><input type="text" name="quantity" class="textInput"></td>  
       
        </tr>
		
		<tr>
            <td></td>
             <td><input type="submit" name="confirm" value="Confirm"></td>  
       
        </tr>
		
		
    </table>
</form>

</body>
</html>
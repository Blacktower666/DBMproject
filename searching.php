<html>
<head>
	<title>Searching</title>
<style>
	h1{font-family:Bradley Hand ITC;font-size:40px; color:pink}
	p{font-family:Arial Black}
	#fail{font-size:25px;background-color:#E6E6FA;margin: 0 auto;margin-top: 10%;height:400px;width:400px;border:5px solid #6495ED;text-align:center;}
	#whole{text-align:center}
</style>
</head>

<body>
<?php
	include 'connectDB.php';
				
	$upnub	= $_POST['upnub'];
	$psw	= $_POST['psw'];
    $isuser = 0;

	$sql = "SELECT * FROM user";

	$result = $conn->query($sql);

	$option = false;
	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		$option = true;
		if($upnub == $row["upnub"]){
			$isuser=1;
			if ($psw == $row["upnub"]){// password from db record
				$uname=$row["uname"];
				$option = true;
				echo "<div id='whole'>
						<form action='data.php' method='POST'>
							
						<h1>Hi, <input type='text' name='usr' value=$uname readonly='readonly' style='border:0px;width=100px; font-family:Bradley Hand ITC;font-size:40px; color:pink' /></h1>
						<h1>You can search here.</h1>
						<input type='text' id='sname' name='sname' placeholder='' style='height:50px; width:600px; '>
						<select name='sort'>
								<option value='Movie'>movie</option>
								<option value='Book'>Book</option>
								<option value='Teleplay'>Teleplay</option>
								<option value='Music'>Music</option>
						</select>
						<br>
						<br>
						<input type='submit' value='Submit'>
						
						</form>
					</div>";
				break;
			} else {
				echo "<div id='fail'>
				<h2>Sorry!Login Faild!</h2><br>
				Your Username is: $upnub  The Password you typed <b>$psw</b> is incorrect<br><br>
				<a href = 'login.php' ><button style='width:100px;font-size:20px;'>Go Back</button></div>";
				break;
			}
		}
		else
			$option = false;
	  }
	} 
	else {
	  echo "0 results";
	}
if($option == false){
	echo "	<div id='fail'>
			<h2>Sorry!Login Faild!</h2><br>
			<p>The username you typed <b>$upnub</b> does not exist</p>
			<h3>Please go back and try again</h3>
			<a href = 'login.php' ><button style='width:100px;font-size:20px;'>Go Back</button></a>
			</div>";
}

	$conn->close();
	
?>



</body>

</html>


<html>
<head>
<title>New Member Operation</title>
<style>
#out{margin: 0 auto;margin-top: 15%;font-size:25px;background-color:#FFF0F5;height:200px;width:400px;font-weight:bold;text-align:center;border:5px solid pink}
#fail{font-size:25px;background-color:#E6E6FA;margin: 0 auto;margin-top: 10%;height:300px;width:400px;border:5px solid #6495ED;text-align:center;}
</style>
</head>

<body>
<?php

include 'connectDB.php';

$uname 	= $_POST["uname"];
$upnub	= $_POST["upnub"];
$upsw	= $_POST["upsw"];
$cupsw   = $_POST["cupsw"];
	$sql = "SELECT count(upnub)
	FROM user
	WHERE upnub = $upnub";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
	if(strlen($upnub)!=11){
		echo "	<div id='out'>
					<p>You phone number is illegal</p>
					<p>Maybe you want to try again</p>
					<a href = 'login.php' ><button style='width:100px;font-size:20px;'>Go!</button></a>
					</div>";
	}
	elseif($row["count(upnub)"]>=1){
		echo "	<div id='out'>
				<p>This phone has been used</p>
				<p>Maybe you want to try again</p>
				<a href = 'login.php' ><button style='width:100px;font-size:20px;'>Go!</button></a>
				</div>";
	}
	elseif($uname != ""&& $upsw != "" && $upsw == $cupsw){
		$sql = "INSERT INTO  user (uname, upnub, upsw)
		 VALUES ('$uname','$upnub','$upsw')";

		if ($conn->query($sql) == TRUE ) {
			echo "	<div id='out'>
					<p>New record created successfully!<p>
					<p>Welcome!<p>
					<a href = 'login.php' ><button style='width:100px;font-size:20px;'>Go!</button></a>
					</div>
					";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}else{
		echo "	<div id='fail'>
				<h3>Sorry!Created unsuccessfully!</h3>
				<h3>Your passwords are not same!</h3>
				<h3>Please go back and try again!</h3>
				<a href = 'newMember.php' ><button style='width:100px;font-size:20px;'>Go Back</button></a>
				</div>
				";
	}
		
?>

</body>
</html>
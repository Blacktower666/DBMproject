<html>
<head>
<title>change</title>
<style>
h1{font-size:50px;text-align:center;color:pink;}
#display2{font-size:25px;background-color:#FFF0F5;position:absolute;left:1100px;top:200px;height:400px;width:400px;font-weight:bold;text-align:center;border:5px solid pink}
input{height:26px;width:180px;font-size:20px;}
#fail{font-size:25px;background-color:#E6E6FA;margin: 0 auto;margin-top: 10%;height:400px;width:400px;border:5px solid #6495ED;text-align:center;}
#sel{height:26px;width:90px;font-size:20px;}
</style>
</head>
<body>
<?php
include 'connectDB.php';

$upnub	= $_POST['pnub'];
$psw	= $_POST['psw'];

$sql = "SELECT *FROM user";

$result = $conn->query($sql);
$option = false;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	if($upnub == $row["upnub"]){
		$option = true;
		if ($psw == $row["upsw"]){// password from db record
            $uname=$row["uname"];
			
			echo "<h1>change password</h1>";
			echo "
				<img src='pic2.jpg' width='960px' height='540px'>
				<h2 style='position:absolute;left:1100px;top:150px;'>Hello!Dear $uname </h2>
				<form action='Change_success.php' method='POST' id='display2'>
					<h2>Your Information:</h2>
					
                    <label for='upnub'>Useraccount:</label><br>
					<input type='test' id='upnub' name='upnub' value='$upnub' readonly='readonly'><br>

					<label for='nuname'>Username:</label><br>
					<input type='text' id='nuname' name='nuname' value='$uname'><br>
					
					<label for='npwd'>Password:</label><br>
					<input type='text' id='npsw' name='npsw' value='$psw'><br>
					
					<p></p>
					<p></p>
					<input style='width:100px' type='submit' value='Submit'>
				</form> 
			";//type='hiden' if want to hide
			break;
		} else {
			echo "	<div id='fail'>
					<h2>Sorry!Login Faild!</h2><br>
					<p>Your Username is: <b>$act</b><br> The Password you typed <b>$psw</b> is incorrect</p>
					<h3>Please go back and try again</h3>
					<a href = 'login.php' ><button style='width:100px;font-size:20px;'>Go Back</button></a>
					</div>";
			break;
		}
	}else 
		$option = false;
	
  }
} else {
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
//return ($user);
?>
</body>

</html>
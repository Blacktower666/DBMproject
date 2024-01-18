<html>

<head>
<title>Update Operation</title>
<style>
#out{margin: 0 auto;margin-top: 15%;font-size:25px;background-color:#FFF0F5;height:200px;width:400px;font-weight:bold;text-align:center;border:5px solid pink}
</style>
</head>

<body>
<?php

include 'connectDB.php';

$upnub = $_POST["upnub"];
$nuname = $_POST["nuname"];
$npsw = $_POST["npsw"];

$sql = "SELECT *FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	if($upnub == $row["upnub"]){
		$sql = "UPDATE user 
			    SET upsw='".$npsw."', uname='".$nuname."'
			    WHERE upnub='".$upnub."'";
		if ($conn->query($sql) == TRUE ) {
			echo "	<div id='out'>
					<h3>Your information has been changed successfully!<h3>
					<a href = 'login.php' ><button style='width:100px;font-size:20px;'>Go!</button></a>
					</div>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
  }
} else {
  echo "0 results";
}
?>

</body>

</html>
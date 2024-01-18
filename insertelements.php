<html>
<head>
<title>New Member Operation</title>
<style>
#out{margin: 0 auto;margin-top: 15%;font-size:25px;background-color:#FFF0F5;height:210px;width:400px;font-weight:bold;text-align:center;border:5px solid pink}
#fail{font-size:25px;background-color:#E6E6FA;margin: 0 auto;margin-top: 10%;height:300px;width:400px;border:5px solid #6495ED;text-align:center;}
</style>
</head>

<body>
<?php

include 'connectDB.php';


$element= $_POST["element"];
$upnub	= $_POST['pnub'];
$psw	= $_POST['psw'];

if ($element=="book"){
    $bname 	= $_POST["bname"];
    $writer	= $_POST["writer"];
    $type	= $_POST["type"];
    $sql = "SELECT count(bname)
    FROM books
    WHERE bname = '$bname'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if($row["count(bname)"]>=1){
		echo "	<div id='out'>
				<p>This book has been insert</p>
				<p>Maybe you want to try another</p>
                <form name=form1 action='Personal_interface.php' method='POST'>
                <input  type='submit' value=Go! >
                <input type='hidden' type='text'  name='pnub' value='$upnub'>
                <input type='hidden' type='text'  name='psw' value='$psw'>
                
                </form> 
				</div>'";
	}//<button style='width:100px;font-size:20px;'>Go!</button>
	elseif($bname != ""&& $writer != "" ){
		$sql = "INSERT INTO  books (bname, writer, type)
		 VALUES ('$bname','$writer','$type')";

		if ($conn->query($sql) == TRUE ) {
			echo "	<div id='out'>
					<p>New book inserted successfully!<p>
					<p>you can go back to 
                    you ower page<p>
					<form name=form1 action='Personal_interface.php' method='POST'>
                    <input  type='submit' value=Go! >
                <input type='hidden' type='text' name='pnub' value='$upnub'>
                <input type='hidden' type='text' name='psw' value='$psw'>
				</div>
				";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
}
elseif ($element=="music"){
    $muname 	= $_POST["muname"];
    $singer	= $_POST["singer"];
    $style	= $_POST["styles"];
    $sql = "SELECT count(muname)
    FROM musics
    WHERE muname = '$muname'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if($row["count(muname)"]>=1){
		echo "	<div id='out'>
				<p>This music has been insert</p>
				<p>Maybe you want to try another</p>
                <form name=form1 action='Personal_interface.php' method='POST'>
                <input  type='submit' value=Go! >
                <input type='hidden' type='text'  name='pnub' value='$upnub'>
                <input type='hidden' type='text'  name='psw' value='$psw'>
                
                </form> 
				</div>'";
	}//<button style='width:100px;font-size:20px;'>Go!</button>
	elseif($muname != ""&& $singer != "" ){
		$sql = "INSERT INTO  musics (muname, singer, style)
		 VALUES ('$muname','$singer','$style')";

		if ($conn->query($sql) == TRUE ) {
			echo "	<div id='out'>
					<p>New music inserted successfully!<p>
					<p>you can go back to 
                    you ower page<p>
					<form name=form1 action='Personal_interface.php' method='POST'>
                    <input  type='submit' value=Go! >
                <input type='hidden' type='text' name='pnub' value='$upnub'>
                <input type='hidden' type='text' name='psw' value='$psw'>
				</div>
				";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
}
elseif ($element=="movie"){
    $moname 	= $_POST["moname"];
    $director	= $_POST["director"];
    $type	= $_POST["type"];
    $sql = "SELECT count(moname)
    FROM movies
    WHERE moname = '$moname'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if($row["count(moname)"]>=1){
		echo "	<div id='out'>
				<p>This movie has been insert</p>
				<p>Maybe you want to try another</p>
                <form name=form1 action='Personal_interface.php' method='POST'>
                <input  type='submit' value=Go! >
                <input type='hidden' type='text'  name='pnub' value='$upnub'>
                <input type='hidden' type='text'  name='psw' value='$psw'>
                
                </form> 
				</div>'";
	}//<button style='width:100px;font-size:20px;'>Go!</button>
	elseif($moname != ""&& $director != "" ){
		$sql = "INSERT INTO  movies (moname, director, type)
		 VALUES ('$moname','$director','$type')";

		if ($conn->query($sql) == TRUE ) {
			echo "	<div id='out'>
					<p>New movie inserted successfully!<p>
					<p>you can go back to 
                    you ower page<p>
					<form name=form1 action='Personal_interface.php' method='POST'>
                    <input  type='submit' value=Go! >
                <input type='hidden' type='text' name='pnub' value='$upnub'>
                <input type='hidden' type='text' name='psw' value='$psw'>
				</div>
				";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
}			
?>

</body>
</html>
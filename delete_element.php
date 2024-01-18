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
$elname = $_POST['elname'];

if ($element=="Book"){
    $sql = "SELECT count(bname)
    FROM books
    WHERE bname = '$elname'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if($row["count(bname)"]<1){
		echo "	<div id='out'>
				<p>can't find this book</p>
				<p>Maybe you want to try another</p>
                <form name=form1 action='Personal_interface.php' method='POST'>
                <input  type='submit' value=Go! >
                <input type='hidden' type='text'  name='pnub' value='$upnub'>
                <input type='hidden' type='text'  name='psw' value='$psw'>
                
                </form> 
				</div>'";
	}//<button style='width:100px;font-size:20px;'>Go!</button>
	else{
		$sql = "DELETE from books
            WHERE bname in (
            SELECT bname
            FROM books
            WHERE bname='$elname')";

		if ($conn->query($sql) == TRUE ) {
			echo "	<div id='out'>
					<p>This book deleted successfully!<p>
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
elseif ($element=="Music"){
    $sql = "SELECT count(muname)
    FROM musics
    WHERE muname = '$elname'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if($row["count(muname)"]<1){
		echo "	<div id='out'>
				<p>can't find this music</p>
				<p>Maybe you want to try another</p>
                <form name=form1 action='Personal_interface.php' method='POST'>
                <input  type='submit' value=Go! >
                <input type='hidden' type='text'  name='pnub' value='$upnub'>
                <input type='hidden' type='text'  name='psw' value='$psw'>
                
                </form> 
				</div>'";
	}//<button style='width:100px;font-size:20px;'>Go!</button>
	else{
		$sql = "DELETE from musics
            WHERE muname in (
            SELECT muname
            FROM musics
            WHERE muname='$elname')";

		if ($conn->query($sql) == TRUE ) {
			echo "	<div id='out'>
					<p>This music delete successfully!<p>
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
elseif ($element=="Movie"){
    $sql = "SELECT count(moname)
    FROM movies
    WHERE moname = '$elname'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if($row["count(moname)"]<1){
		echo "	<div id='out'>
				<p>can't find this movie</p>
				<p>Maybe you want to try another</p>
                <form name=form1 action='Personal_interface.php' method='POST'>
                <input  type='submit' value=Go! >
                <input type='hidden' type='text'  name='pnub' value='$upnub'>
                <input type='hidden' type='text'  name='psw' value='$psw'>
                
                </form> 
				</div>'";
	}//<button style='width:100px;font-size:20px;'>Go!</button>
	else{
		$sql = "DELETE from movies
            WHERE moname in (
            SELECT moname
            FROM movies
            WHERE moname='$elname')";
		if ($conn->query($sql) == TRUE ) {
			echo "	<div id='out'>
					<p>This movie deleted successfully!<p>
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
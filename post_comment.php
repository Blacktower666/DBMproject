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
$commentword=$_POST['commentword'];
$elname=$_POST['elname'];
$psw=$_POST['psw'];

if ($element=="Book"){
    $sql = "SELECT uID
    FROM user
    WHERE upnub = $upnub";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $uID=$row["uID"];

    $bID = $_POST["bID"];
    $sql = "INSERT INTO  book_comment(bID, uID, commentword)
		 VALUES ('$bID','$uID','$commentword')";
    
    
    if ($conn->query($sql) == TRUE ) {
        echo "	<div id='out'>
                <p>Commend successfully!<p>
                <p>you can go back to 
                you answer page<p>
                <form name=form1 action='answer.php' method='POST'>
                <input  type='submit' value=Go! >
            <input type='hidden' type='text' name='pnub' value='$upnub'>
            <input type='hidden' type='text' name='psw' value='$psw'>
            <input type='hidden' type='text' name='elname' value='$elname'>
            <input type='hidden' type='text' name='element' value='$element'>
            </div>
            ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}
elseif($element=="Movie"){
    $sql = "SELECT uID
    FROM user
    WHERE upnub = $upnub";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $uID=$row["uID"];

    $moID = $_POST["moID"];
    $sql = "INSERT INTO  movie_comment(moID, uID, commentword)
		 VALUES ('$moID','$uID','$commentword')";
    
    
    if ($conn->query($sql) == TRUE ) {
        echo "	<div id='out'>
                <p>Commend successfully!<p>
                <p>you can go back to 
                you answer page<p>
                <form name=form1 action='answer.php' method='POST'>
                <input  type='submit' value=Go! >
            <input type='hidden' type='text' name='pnub' value='$upnub'>
            <input type='hidden' type='text' name='psw' value='$psw'>
            <input type='hidden' type='text' name='elname' value='$elname'>
            <input type='hidden' type='text' name='element' value='$element'>
            </div>
            ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
elseif($element=="Music"){
    $sql = "SELECT uID
    FROM user
    WHERE upnub = $upnub";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $uID=$row["uID"];

    $muID = $_POST["muID"];
    $sql = "INSERT INTO  music_comment(muID, uID, commentword)
		 VALUES ('$muID','$uID','$commentword')";
    
    
    if ($conn->query($sql) == TRUE ) {
        echo "	<div id='out'>
                <p>Commend successfully!<p>
                <p>you can go back to 
                you answer page<p>
                <form name=form1 action='answer.php' method='POST'>
                <input  type='submit' value=Go! >
            <input type='hidden' type='text' name='pnub' value='$upnub'>
            <input type='hidden' type='text' name='psw' value='$psw'>
            <input type='hidden' type='text' name='elname' value='$elname'>
            <input type='hidden' type='text' name='element' value='$element'>
            </div>
            ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}					
?>

</body>
</html>
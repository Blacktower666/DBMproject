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
$uID= $_POST['uID'];
$psw=$_POST['psw'];
$upnub=$_POST['pnub'];
$elname=$_POST['elname'];
if ($element=="Book"){
    $bID=$_POST["bID"];
    $sql = "DELETE from book_favor
            WHERE bfID in (
            SELECT bfID
            FROM book_favor
            WHERE bID='$bID' and uID='$uID')";
        
        
        if ($conn->query($sql) == TRUE ) {
            echo "	<div id='out'>
                    <p>You excluded this book from your favor<p>
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
    $moID=$_POST["moID"];
    $sql = "DELETE from movie_favor
            WHERE mofID in (
            SELECT mofID
            FROM movie_favor
            WHERE moID='$moID' and uID='$uID')";
        
        
        if ($conn->query($sql) == TRUE ) {
            echo "	<div id='out'>
                    <p>You excluded this movie from your favor<p>
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
    $moID=$_POST["muID"];
    $sql = "DELETE from music_favor
            WHERE mufID in (
            SELECT mufID
            FROM music_favor
            WHERE muID='$muID' and uID='$uID')";
        
        
        if ($conn->query($sql) == TRUE ) {
            echo "	<div id='out'>
                    <p>You excluded this music from your favor<p>
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
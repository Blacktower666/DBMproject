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
    $sql = "INSERT INTO  book_favor(bID, uID)
            VALUES ('$bID','$uID')";
        
        
        if ($conn->query($sql) == TRUE ) {
            echo "	<div id='out'>
                    <p>you add this book in you favor<p>
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
    $sql = "INSERT INTO  movie_favor(moID, uID)
            VALUES ('$moID','$uID')";
        
        
        if ($conn->query($sql) == TRUE ) {
            echo "	<div id='out'>
                    <p>you add this movie in you favor<p>
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
    $muID=$_POST["muID"];
    $sql = "INSERT INTO  music_favor(muID, uID)
            VALUES ('$muID','$uID')";
        
        
        if ($conn->query($sql) == TRUE ) {
            echo "	<div id='out'>
                    <p>you add this music in you favor<p>
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
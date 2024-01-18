<!--Rita Chen's(2030026023) part-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up</title>
<style>
h1{font-size:50px;text-align:center;color:pink;}
#display1{font-size:25px;background-color:#FFF0F5;left:1100px;top:180px;height:380px;width:400px;position:absolute;font-weight:bold;text-align:center;border:5px solid pink}
input{height:26px;width:180px;font-size:20px;}
#sel{height:26px;width:80px;font-size:20px;}

</style>
</head>

<body>
<h1>New Membership Sign Up</h1>
<img src="pic.jpg"  width="960px" height="540px">

<form action="insertMem.php" method="POST" id="display1">
<p></p><!--get new user information-->

<label for="uname" >Username:</label><br>
<input type="text" name="uname" required /><br>

<label for="upnub" >Phonenumber:</label><br>
<input type="number" name="upnub" required /><br>

<label for="upsw" >Password:</label><br>
<input type="password" name="upsw" required /><br>

<label for="cupsw" >Confirm Password:</label><br>
<input type="password" name="cupsw" required /><br>


<p><input style="width:100px" type="submit" value="Enter" /></p><!--upload information-->
</form>


</body>
</html>
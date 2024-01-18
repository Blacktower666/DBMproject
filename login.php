<!--Blair's(2030026100) part-->
<html>
<style>
h2{color:pink;}
body{background: url('logbg.jpg');}
#d1{width: 400px;height: 330px;margin: 0 auto;margin-top: 15%;text-align: center;background: #00000060;padding: 20px 50px;}
input {margin-top: 15px;width: 180px;font-size: 18px;border: 0;border-bottom: 2px ;solid: #fff;padding: 5px 10px;background:#ffffff00;color: #fff;}
.button {
            border-color: cornsilk;
            color: aliceblue;
            border-style: hidden;
            border-radius: 5px;
            width: 100px;
            height: 31px;
            font-size: 16px;
        }
.lj{color:white;}
</style>
<body>
<div id="d1">
<h2>Login</h2>
<form name=form1 action="" method="POST"><!--get information from user-->
  <input type="text" id="pnub" name="pnub" placeholder="Username"><br><br>
  <input type="password" id="psw" name="psw" placeholder="Password"><br><br>
  <input class="botton" type=button value=Login onclick="changeAction('Personal_interface.php')"><br>
  <input class="botton" type=button value='change password' onclick="changeAction('change.php')">
</form> 
<a class="lj" href="newMember.php">New user</a>
</div>

<script>
function changeAction(ac)<!--choice which page to go-->
{
	document.form1.action=ac;
	document.form1.submit();
}
</script>
</body>

</html>

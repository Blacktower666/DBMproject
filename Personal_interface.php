<html>
<head>
	<title>Personal_interface</title>
<style>
	h1{font-family:Bradley Hand ITC;font-size:40px; color:pink}
	p{font-family:Arial Black}
	#fail{font-size:25px;background-color:#E6E6FA;margin: 0 auto;margin-top: 10%;height:400px;width:400px;border:5px solid #6495ED;text-align:center;}
	#whole{text-align:center}
	#likes{margin:auto;border:2px ;position: absolute;  width: 1000px; height: 1000px;left:0px;right:0px;}
	#box1{border:2px pink solid;position: absolute;  width: 200px; height: 400px;left:0px;right:0px;}
	#box2{border:2px pink solid;position: absolute;  width: 200px; height: 400px;left:400px;right:0px;}
	#box3{border:2px pink solid;position: absolute;  width: 200px; height: 400px;left:800px;right:0px;}
	#vip{position: absolute;top:75;left:900px;right:0px;}
	#insert{margin:auto;border:2px pink solid;  width: 400px; height: 600px;}
</style>
</head>

<body>
<?php
	include 'connectDB.php';
				
	$upnub	= $_POST['pnub'];
	$psw	= $_POST['psw'];
    $isuser = 0;

	$sql = "SELECT * FROM user";
	$result = $conn->query($sql);

    $sql1 = "SELECT * FROM owner";
    $result1 = $conn->query($sql1);

	$option = false;

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		if($upnub == $row["upnub"]){
            $option = true;
			$isuser=1;
			if ($psw == $row["upsw"]){// password from db record
				$uname=$row["uname"];
				echo "
					<div id='vip'>
						<input type='submit' value='Become VIP'>
					</div>
					<div id='whole'>
						<div id='search'>
							<form action='answer.php' method='POST'>	
							<h1>Hi, <input type='text' name='usr' value=$uname readonly='readonly' style='border:0px;width=100px; font-family:Bradley Hand ITC;font-size:40px; color:pink' /></h1>
							<h1>You can search here.</h1>
							<input type='text' name='elname' placeholder='' style='height:50px; width:600px; '>
							<select name='element'>
									<option value='Movie'>Movie</option>
									<option value='Book'>Book</option>
									<option value='Music'>Music</option>
							</select><input type='hidden' type='text'  name='pnub' value='$upnub'>
							<input type='hidden' type='password'  name='psw' value='$psw'>
							<br>
							<br>
							<input type='submit' value='Submit'>
							
							</form>
						</div>
							<div id='likes'>
								<div id='box1'> <!--customer information box-->
									<p id='p1'>books you likes</p>
								</div>
								<div id='box2'> <!--customer information box-->
									<p id='p1'>movies you likes</p>
									
								</div>
								<div id='box3'> <!--customer information box-->
									<p id='p1'>musics you likes</p>
									
								</div>
							</div>
					</div>"
					
					;
				break;
			} else {
				echo "<div id='fail'>
				<h2>Sorry!Login Faild!</h2><br>
				Your Username is: $upnub  The Password you typed <b>$psw</b> is incorrect<br><br>
				<a href = 'login.php' ><button style='width:100px;font-size:20px;'>Go Back</button></div>";
				break;
			}
		}
		else
			$option = false;
	  }
	} 
	else {
	  echo "0 results";
	}
    
    if($isuser==0){
        if ($result1->num_rows > 0) {
            // output data of each row
            while($row = $result1->fetch_assoc()) {
                if($upnub == $row["oact"]){
                    $option = true;
                    if ($psw == $row["opsw"]){// password from db record
                        $oname=$row["oname"];
                        echo "<div id='whole'>
						<h1>Hi, <input type='text' name='usr' value=$oname readonly='readonly' style='border:0px;width=100px; font-family:Bradley Hand ITC;font-size:40px; color:pink' /></h1>
						<h1>You are onwer.</h1>
							<div id='insert'>
							<p>You can insert element here</p>
							<p>Set attributes for the element</p>
							<script>
								onload=function(){
									var sel=document.getElementById('sel');
									sel.children[1].selected=true;
									document.fm1.style.display='none';
									document.fm2.style.display='block';
									document.fm3.style.display='none';
									sel.onchange=function(){
										var op=this[this.selectedIndex].innerHTML.replace(/^\s+|\s+$/g,'');
										if(op=='Music'){
											document.fm1.style.display='block';
											document.fm2.style.display='none';
											document.fm3.style.display='none';
										}else if(op=='Book'){
											document.fm1.style.display='none';
											document.fm2.style.display='block';
											document.fm3.style.display='none';
										}else if(op=='Movie'){
											document.fm1.style.display='none';
											document.fm2.style.display='none';
											document.fm3.style.display='block';
										}
									}
								}
							</script>
						</head> 
						<body>
							<select id='sel'>
								<option>Music</option>
								<option>Book</option>
								<option>Movie</option>
							</select>
							<form action='insertelements.php' method='POST' name='fm1'>
								Music name:<input type='text' name='muname' required /><br />
								singer:<input type='text' name='singer' required /><br />
								style:<input type='text' name='styles'/>
								<input type='hidden' type='text' name='element' value='music'/>
								<input type='hidden' type='text'  name='pnub' value='$upnub'>
								<input type='hidden' type='password'  name='psw' value='$psw'>
								<br><br>
								<input type='submit' value ='Submit'>
							</form>
							<form action='insertelements.php' method='POST' name='fm2'>
								Book name:<input type='text' name='bname' required /><br />
								Writer:<input type='text' name='writer' required /><br />
								type:<input type='text' name='type'/>
								<input type='hidden' type='text' name='element' value='book'/>
								<input type='hidden' type='text'  name='pnub' value='$upnub'>
								<input type='hidden' type='password'  name='psw' value='$psw'>
								<br><br>
								<input type='submit' value ='Submit'>
							</form>
							<form action='insertelements.php' method='POST' name='fm3'>
								Movie name:<input type='text' name='moname' required /><br />
								director:<input type='text' name='director' required /><br />
								type:<input type='text' name='type'/>
								<input type='hidden' type='text' name='element' value='movie'/>
								<input type='hidden' type='text'  name='pnub' value='$upnub'>
								<input type='hidden' type='password'  name='psw' value='$psw'>
								<br><br>
								<input type='submit' value ='Submit'>
							</form>
							<p>You can delete element here</p>
							<form action='delete_element.php' method='POST' >
							<select name='element'>
								<option>Music</option>
								<option>Book</option>
								<option>Movie</option>
							</select><input type='submit' value ='Submit'><br><br>
							<input  type='text' name='elname' style='height:30px; width:300px;'/>
							<input type='hidden' type='text'  name='pnub' value='$upnub'>
							<input type='hidden' type='password'  name='psw' value='$psw'>
							</form>						
							</div>
                        </div>";
                        break;
                    } 
                }
            }
        } 
        else {
            echo "0 results";
        }
    }

    if($option == false && $isuser == 0){
        echo "	<div id='fail'>
                <h2>Sorry!Login Faild!</h2><br>
                <p>The username you typed <b>$upnub</b> does not exist</p>
                <h3>Please go back and try again</h3>
                <a href = 'login.php' ><button style='width:100px;font-size:20px;'>Go Back</button></a>
                </div>";
    }

	$conn->close();
	
?>



</body>

</html>
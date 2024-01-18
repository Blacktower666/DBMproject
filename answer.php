<html>
  <style>
  #out{margin: 0 auto;margin-top: 15%;font-size:25px;background-color:#FFF0F5;height:210px;width:400px;font-weight:bold;text-align:center;border:5px solid pink}
  </style>
  <head>
    <title>Answer</title>
  </head>

  <body>
    <?php
      include 'connectDB.php';
      $element=$_POST['element'];
      $elname=$_POST['elname'];
      $upnub	= $_POST['pnub'];
      $psw	= $_POST['psw'];

      $sql = "SELECT uID
              FROM user
              WHERE upnub = $upnub";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $uID=$row["uID"];

      
      if($element=='Book'){
        $sql = "SELECT count(bname)
                FROM books
                WHERE bname = '$elname'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                
                if($row["count(bname)"]<1){
                echo "	<div id='out'>
                    <p>We can't find this book</p>
                    <p>Maybe you want to try again</p>
                <form name=form1 action='Personal_interface.php' method='POST'>
                <input  type='submit' value=Go! >
                <input type='hidden' type='text'  name='pnub' value='$upnub'>
                <input type='hidden' type='text'  name='psw' value='$psw'> 
                </form> 
				</div>'";
	      }
        else{
          $sql = "SELECT bID,bname,writer,type,description
                FROM books
                WHERE bname = '$elname'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
        $bID=$row["bID"];
        $bname=$row["bname"];
        $writer=$row["writer"];
        $type1=$row["type"];
        $description=$row["description"];

        $sql = "SELECT count(bfID)
                FROM book_favor
                WHERE uID = '$uID' and bID='$bID'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $iffavor=$row['count(bfID)'];
          echo "<table width='600' height='170' border='0' align='center' cellpadding='0' cellspacing='1' bordercolorlight='#FF9933' bordercolordark='#FFFFFF' bgcolor='#666666'>
            <thead>
              <tr>
                <td width='14%' align='center' bgcolor='#FFFFFF'><p>$bname</p></td>
              </tr>
              <tr> 
                <td width='86%' align='left' bgcolor='#FFFFFF'><p>Writer:$writer</p>
                <p>Type:$type1</p>
                <p>Description:$description</p></td>
              </tr>
            </thead>
          </table>   
            <table width='600' height='122' border='0' align='center' cellpadding='0' cellspacing='0'>
              <tr>
                <td width='119' height='14'></td>
                <td width='481'></td>
              </tr>";
              if($iffavor==0){
                echo "<tr><td>
                <form action='favor.php' method='POST'>
                <input type='hidden' type='text'  name='pnub' value='$upnub'>
                <input type='hidden' type='text' name='psw' value='$psw'>
                <input type='hidden' type='text'  name='uID' value='$uID'>
                <input type='hidden' type='number'  name='bID' value='$bID'>
                <input type='hidden' type='text' name='elname' value='$elname'/>
                <input type='hidden' type='text' name='element' value='Book'/>
                <input  type='submit' value=favor >
                </form>
              </td></tr>";
              }else{
                echo "<tr><td>
                <form action='disfavor.php' method='POST'>
                <input type='hidden' type='text'  name='pnub' value='$upnub'>
                <input type='hidden' type='text' name='psw' value='$psw'>
                <input type='hidden' type='text'  name='uID' value='$uID'>
                <input type='hidden' type='number'  name='bID' value='$bID'>
                <input type='hidden' type='text' name='elname' value='$elname'/>
                <input type='hidden' type='text' name='element' value='Book'/>
                <input  type='submit' value=disfavor >
                </form>
              </td></tr>";
              }
              echo "<tr>
                <td align='center'>comment：</td>
                <td><form action='post_comment.php' name='form1' method='POST'> 
                <textarea name='commentword' cols='60' rows='6' id='content' required></textarea>
                <input type='hidden' type='text'  name='pnub' value='$upnub'>
                <input type='hidden' type='text' name='psw' value='$psw'>
                <input type='hidden' type='number'  name='bID' value='$bID'>
                <input type='hidden' type='text' name='elname' value='$elname'/>
                <input type='hidden' type='text' name='element' value='Book'/>
                <br><br>
                <input name='Button' type='submit' class='btn_grey' value='post'> 
                </form></td>
              </tr>
            </table>
            <table width='600' border='1' align='center' cellpadding='0' cellspacing='0' bordercolor='#FFFFFF' bordercolorlight='#666666' bordercolordark='#FFFFFF' id='comment'>
            <tr>
              <td width='18%' height='27' align='center' bgcolor='#E5BB93'>observer</td>
              <td width='82%' align='center' bgcolor='#E5BB93'>comment</td>
            </tr>
          ";
            $sql = "SELECT * From book_comment WHERE bID=$bID";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
              $tuID=$row['uID'];
              $tcom=$row['commentword'];
              $tsql = "SELECT uname From user WHERE uID=$tuID";
              $tresult = $conn->query($tsql);
              $trow = $tresult->fetch_assoc();
              $tuname=$trow['uname'];
                echo "<tr>
                      <td >$tuname</td>
                      <td >$tcom</td>
                      </tr>";
            }
            echo "</table>";
          }
      }
      elseif($element=='Movie'){
        $sql = "SELECT count(moname)
                FROM movies
                WHERE moname = '$elname'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                
                if($row["count(moname)"]<1){
                echo "	<div id='out'>
                    <p>We can't find this movie</p>
                    <p>Maybe you want to try again</p>
                <form name=form1 action='Personal_interface.php' method='POST'>
                <input  type='submit' value=Go! >
                <input type='hidden' type='text'  name='pnub' value='$upnub'>
                <input type='hidden' type='text'  name='psw' value='$psw'> 
                </form> 
				</div>'";
	      }
        else{
          $sql = "SELECT moID,moname,director,type
                FROM movies
                WHERE moname = '$elname'";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $moID=$row["moID"];
          $moname=$row["moname"];
          $director=$row["director"];
          $type1=$row["type"];
          $description="NULL";
          //$description=$row["description"];

          $sql = "SELECT count(moID)
                  FROM movie_favor
                  WHERE uID = '$uID' and moID='$moID'";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $iffavor=$row['count(moID)'];
          echo "<table width='600' height='170' border='0' align='center' cellpadding='0' cellspacing='1' bordercolorlight='#FF9933' bordercolordark='#FFFFFF' bgcolor='#666666'>
            <thead>
              <tr>
                <td width='14%' align='center' bgcolor='#FFFFFF'><p>$moname</p></td>
              </tr>
              <tr> 
                <td width='86%' align='left' bgcolor='#FFFFFF'><p>Writer:$director</p>
                <p>Type:$type1</p>
                <p>Description:$description</p></td>
              </tr>
            </thead>
          </table>   
            <table width='600' height='122' border='0' align='center' cellpadding='0' cellspacing='0'>
              <tr>
                <td width='119' height='14'></td>
                <td width='481'></td>
              </tr>";
              if($iffavor==0){
                echo "<tr><td>
                <form action='favor.php' method='POST'>
                <input type='hidden' type='text'  name='pnub' value='$upnub'>
                <input type='hidden' type='text' name='psw' value='$psw'>
                <input type='hidden' type='text'  name='uID' value='$uID'>
                <input type='hidden' type='number'  name='moID' value='$moID'>
                <input type='hidden' type='text' name='elname' value='$elname'/>
                <input type='hidden' type='text' name='element' value='Movie'/>
                <input  type='submit' value=favor >
                </form>
              </td></tr>";
              }else{
                echo "<tr><td>
                <form action='disfavor.php' method='POST'>
                <input type='hidden' type='text'  name='pnub' value='$upnub'>
                <input type='hidden' type='text' name='psw' value='$psw'>
                <input type='hidden' type='text'  name='uID' value='$uID'>
                <input type='hidden' type='number'  name='moID' value='$moID'>
                <input type='hidden' type='text' name='elname' value='$elname'/>
                <input type='hidden' type='text' name='element' value='Movie'/>
                <input  type='submit' value=disfavor >
                </form>
              </td></tr>";
              }
              echo "<tr>
                <td align='center'>comment：</td>
                <td><form action='post_comment.php' name='form1' method='POST'> 
                <textarea name='commentword' cols='60' rows='6' id='content' required></textarea>
                <input type='hidden' type='text'  name='pnub' value='$upnub'>
                <input type='hidden' type='text' name='psw' value='$psw'>
                <input type='hidden' type='number'  name='moID' value='$moID'>
                <input type='hidden' type='text' name='elname' value='$elname'/>
                <input type='hidden' type='text' name='element' value='Movie'/>
                <br><br>
                <input name='Button' type='submit' class='btn_grey' value='post'> 
                </form></td>
              </tr>
            </table>
            <table width='600' border='1' align='center' cellpadding='0' cellspacing='0' bordercolor='#FFFFFF' bordercolorlight='#666666' bordercolordark='#FFFFFF' id='comment'>
            <tr>
              <td width='18%' height='27' align='center' bgcolor='#E5BB93'>observer</td>
              <td width='82%' align='center' bgcolor='#E5BB93'>comment</td>
            </tr>
          ";
            $sql = "SELECT * From movie_comment WHERE moID=$moID";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
              $tuID=$row['uID'];
              $tcom=$row['commentword'];
              $tsql = "SELECT uname From user WHERE uID=$tuID";
              $tresult = $conn->query($tsql);
              $trow = $tresult->fetch_assoc();
              $tuname=$trow['uname'];
                echo "<tr>
                      <td >$tuname</td>
                      <td >$tcom</td>
                      </tr>";
            }
            echo "</table>";
          }
        }
          elseif($element=='Music'){
            $sql = "SELECT count(muname)
                    FROM musics
                    WHERE muname = '$elname'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    
                    if($row["count(muname)"]<1){
                    echo "	<div id='out'>
                        <p>We can't find this muvie</p>
                        <p>Maybe you want to try again</p>
                    <form name=form1 action='Personal_interface.php' method='POST'>
                    <input  type='submit' value=Go! >
                    <input type='hidden' type='text'  name='pnub' value='$upnub'>
                    <input type='hidden' type='text'  name='psw' value='$psw'> 
                    </form> 
            </div>'";
            }
            else{
              $sql = "SELECT muID,muname,singer,style
                    FROM musics
                    WHERE muname = '$elname'";
              $result = $conn->query($sql);
              $row = $result->fetch_assoc();
              $muID=$row["muID"];
              $muname=$row["muname"];
              $singer=$row["singer"];
              $style=$row["style"];
              $description="NULL";
              //$description=$row["description"];
    
              $sql = "SELECT count(muID)
                      FROM music_favor
                      WHERE uID = '$uID' and muID='$muID'";
              $result = $conn->query($sql);
              $row = $result->fetch_assoc();
              $iffavor=$row['count(muID)'];
              echo "<table width='600' height='170' border='0' align='center' cellpadding='0' cellspacing='1' bordercolorlight='#FF9933' bordercolordark='#FFFFFF' bgcolor='#666666'>
                <thead>
                  <tr>
                    <td width='14%' align='center' bgcolor='#FFFFFF'><p>$muname</p></td>
                  </tr>
                  <tr> 
                    <td width='86%' align='left' bgcolor='#FFFFFF'><p>singer:$singer</p>
                    <p>style:$style</p>
                    <p>Description:$description</p></td>
                  </tr>
                </thead>
              </table>   
                <table width='600' height='122' border='0' align='center' cellpadding='0' cellspacing='0'>
                  <tr>
                    <td width='119' height='14'></td>
                    <td width='481'></td>
                  </tr>";
                  if($iffavor==0){
                    echo "<tr><td>
                    <form action='favor.php' method='POST'>
                    <input type='hidden' type='text'  name='pnub' value='$upnub'>
                    <input type='hidden' type='text' name='psw' value='$psw'>
                    <input type='hidden' type='text'  name='uID' value='$uID'>
                    <input type='hidden' type='number'  name='muID' value='$muID'>
                    <input type='hidden' type='text' name='elname' value='$elname'/>
                    <input type='hidden' type='text' name='element' value='Music'/>
                    <input  type='submit' value=favor >
                    </form>
                  </td></tr>";
                  }else{
                    echo "<tr><td>
                    <form action='disfavor.php' method='POST'>
                    <input type='hidden' type='text'  name='pnub' value='$upnub'>
                    <input type='hidden' type='text' name='psw' value='$psw'>
                    <input type='hidden' type='text'  name='uID' value='$uID'>
                    <input type='hidden' type='number'  name='muID' value='$muID'>
                    <input type='hidden' type='text' name='elname' value='$elname'/>
                    <input type='hidden' type='text' name='element' value='Music'/>
                    <input  type='submit' value=disfavor >
                    </form>
                  </td></tr>";
                  }
                  echo "<tr>
                    <td align='center'>comment：</td>
                    <td><form action='post_comment.php' name='form1' method='POST'> 
                    <textarea name='commentword' cols='60' rows='6' id='content' required></textarea>
                    <input type='hidden' type='text'  name='pnub' value='$upnub'>
                    <input type='hidden' type='text' name='psw' value='$psw'>
                    <input type='hidden' type='number'  name='muID' value='$muID'>
                    <input type='hidden' type='text' name='elname' value='$elname'/>
                    <input type='hidden' type='text' name='element' value='Music'/>
                    <br><br>
                    <input name='Button' type='submit' class='btn_grey' value='post'> 
                    </form></td>
                  </tr>
                </table>
                <table width='600' border='1' align='center' cellpadding='0' cellspacing='0' bordercolor='#FFFFFF' bordercolorlight='#666666' bordercolordark='#FFFFFF' id='comment'>
                <tr>
                  <td width='18%' height='27' align='center' bgcolor='#E5BB93'>observer</td>
                  <td width='82%' align='center' bgcolor='#E5BB93'>comment</td>
                </tr>
              ";
                $sql = "SELECT * From music_comment WHERE muID=$muID";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                  $tuID=$row['uID'];
                  $tcom=$row['commentword'];
                  $tsql = "SELECT uname From user WHERE uID=$tuID";
                  $tresult = $conn->query($tsql);
                  $trow = $tresult->fetch_assoc();
                  $tuname=$trow['uname'];
                    echo "<tr>
                          <td >$tuname</td>
                          <td >$tcom</td>
                          </tr>";
                }
                echo "</table>";
              }
      }
  ?>
  </body>
</html>

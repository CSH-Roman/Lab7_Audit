<html>
 <head>
  <title>php test</title>
 </head>
 <body>
  <?php
   $user_name = $_GET["uname"];
   $password  = $_GET["password"];
   $cmd_u = 'curl -XGET \'http://172.31.22.95:9200/profile/_search?q=uname:' . $user_name.'\'';
   $last_line = system($cmd_u, $retval);
   $uname_con = strlen($last_line);
   echo '<p> Output ' . $last_line . '</p>';
   echo '<p> BOOL ' . $uname_con . '</p>';
   if($uname_con < "123"){
     echo '<p> User Not Found ' . $user_name . '</p>';
   }
   else{
    $cmd_p = 'curl -XGET \'http://172.31.22.95:9200/profile/_search?q=password:' . $password.'\'';
    $cmdp_line = system($cmd_p, $returnval);
    $pass_con = strlen($cmdp_line);
    if($pass_con < "123"){
     echo '<p> Wrong Password' . $password . ' length ' . $pass_con . '</p>';
    }
    else{
     //pasrse stuff
     echo '<p> found user</p>';
     $token = strtok($last_line, ",");
     $index = 0;
     //parse json get important lines
     while($token !== false){
        $index = $index + 1;
	if($index == 10){
	  $uid = $token;
	}
         if($index == 12){
	  $user_name = $token;
         }
         else if($index == 13){
	  $fname = $token;
	 }
	 else if($index == 14){
	  $lname = $token;
	 }
	 else if($index == 15){
	  $password = $token;
	 }
	 else if($index == 16){
	  $status = $token;
	 }
	 else if($index == 17){
	  $profession = $token;
	 }
	$token =strtok(",");
     }
     //parse to get data
     $token = strtok($user_name, "\"");
     $index = 0;
     while($token !== false){
	$index = $index +1;
	if($index == 5){
	  $user = $token;
        }
	$token =strtok("\"");
     }
     echo '<p> User Name: ' . $user . '</p>';
     $token = strtok($fname, "\"");
     $index = 0;
     while($token !== false){
	$index = $index +1;
	if($index == 4){
	  $first_name = $token;
	}
	$token =strtok("\"");
     }
     echo '<p> First Name: ' . $first_name . '</p>';
     $token = strtok($lname, "\"");
     $index = 0;
     while($token !== false){
	$index = $index +1;
	if($index == 4){
	  $last_name = $token;
	}
	$token =strtok("\"");
     }
     echo '<p> Last Name: ' . $last_name . '</p>';
     $token = strtok($password, "\"");
     $index = 0;
     while($token !== false){
	$index = $index +1;
	if($index == 4){
	  $pass = $token;
	}
	$token =strtok("\"");
     }
     echo '<p> Password: ' . $pass . '</p>';
     $token = strtok($status, "\"");
     $index = 0;
     while($token !== false){
	$index = $index +1;
	if($index == 4){
	  $stat = $token;
	}
	$token =strtok("\"");
     }
     echo '<p> Status: ' . $stat . '</p>';
     $token = strtok($profession, "\"");
     $index = 0;
     while($token !== false){
	$index = $index +1;
	if($index == 4){
	  $prof = $token;
	}
	$token =strtok("\"");
     }
     echo '<p> Profession: ' . $prof . '</p>';
     $token = strtok($uid, "\"");
     $index = 0;
     while($token !== false){
	$index = $index +1;
	if($index == 3){
	  $userid = $token;
	}
	$token =strtok("\"");
     }
     echo '<p> Userid: ' . $userid . '</p>';

    }
   }
  ?>
				<form method="post" action="test4.php">
						First Name:<br>
						<input id="fname" type="text" tabindex="1" value="" name="fname" maxlength='20' required></input>
						<br>
						Last Name:<br>
						<input id="lname" type="text" tabindex="1" value="" name="lname" maxlength='20' required></input>
						<br>
						Password:<br>
						<input id="password" type="text" tabindex="1" value="" name="password" maxlength='20' required></input>
						<br>
						Username:<br>
						<input id="uname" type="text" tabindex="1" value="" name="uname" maxlength='20' required></input>
						<br>
						Status:<br>
						<input id="status" type="text" tabindex="1" value="" name="status" maxlength='20' required></input>
						<br>
						Profession:<br>
						<input id="profession" type="text" tabindex="1" value="" name="profession" maxlength='20' required></input>
						<br>
						Userid:<br>
						<input id="userid" type="text" tabindex="1" value="" name="userid" maxlength='20' required></input>
						<br><br>
						<input type="submit"/>
				</form>

 </body>
</html>

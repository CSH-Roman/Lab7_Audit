<html>
 <head>
  <title>php test</title>
 </head>
 <body>
  <?php
   $user_name = $_GET["uname"];
   $cmd_u = 'curl -XGET \'http://172.31.22.95:9200/profile/_search?q=uname:' . $user_name.'\'';
   $last_line = system($cmd_u, $retval);
   $uname_con = strlen($last_line);
   if($uname_con < "123"){
     echo '<p> User Not Found ' . $user_name . '</p>';
   }
   else{
     //pasrse stuff
     echo '<p> found user</p>';
     $token = strtok($last_line, ",");
     $index = 0;
     //parse json get important lines
     while($token !== false){
        $index = $index + 1;
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
   }
  ?>
 </body>
</html>

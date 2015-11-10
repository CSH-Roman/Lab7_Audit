<html>
 <head>
  <title>php test</title>
 </head>
 <body>
  <?php
   $first_name = $_POST["fname"];
   $last_name = $_POST["lname"];
   $pass = $_POST["password"];
   $user_name = $_POST["uname"];
   $status = $_POST["status"];
   $profession = $_POST["profession"];
   $userid = $_POST["userid"];
   $cmd = 'curl -XPOST \'http://172.31.22.95:9200/profile/external/' . $userid .'/_update?pretty\' -d \'{ "doc":{ "uname" : "' . $user_name.'", "fname" : "' . $first_name. '", "lname" : "' . $last_name. '", "password" : "' . $pass .'", "status" : "' . $status . '", "profession" : "' . $profession . '"}}\'';
   $last_line = system($cmd, $retval);
   echo '<p> Output ' . $last_line . '</p>';
   echo '<p> last name ' . $last_name . '</p>';
   echo '<p> first name ' . $first_name . '</p>';
   echo '<p> first name ' . $status . '</p>';
   echo '<p> first name ' . $profession . '</p>';
   echo '<p> first name ' . $user_name . '</p>';
   echo '<p> password ' . $pass . '</p>';
  ?>
 </body>
</html>

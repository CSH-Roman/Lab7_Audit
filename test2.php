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
   $cmd = 'curl -XPOST \'http://172.31.22.95:9200/profile/external?pretty\' -d \'{ "uname" : "' . $user_name.'", "fname" : "' . $first_name. '", "lname" : "' . $last_name. '", "password" : "' . $pass .'", "status" : "' . $status . '", "profession" : "' . $profession . '"}\'';
   $last_line = system($cmd, $retval);
   echo '<p> Output ' . $last_line . '</p>';
   echo '<p> last name ' . $last_name . ' password ' . $pass . ' first name ' . $first_name . '</p>';
  ?>
 </body>
</html>

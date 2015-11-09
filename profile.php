<!DOCTYPE html>
<html>
<body>

<h1>Your Profile</h1>

<!-- need to include port numberl-->
<?php
if(isset($_POST['add'])){
$servername = "http://ec2-52-33-75-153.us-west-2.compute.amazonaws.com:3036";
$username = "root";
$password = "password";
$dbname = "social";

// Create connection
$conn = mysql_connect($servername, $username, $password, $dbname);
// Check connection
if (! $conn) {
    die("Connection failed: " . mysql_error());
}
$uname = $_POST['uname']

//make sure column names are correct
$sql = $sql = 'SELECT firstname, lastname, 
               username, password
        FROM social
        WHERE username="$uname"';

mysql_select_db('social');
$return_value = mysql_query($sql, $conn);
if(! $return_value)
{
	die('Just could not do it ' . mysql_error);
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "Tutorial ID :{$row['tutorial_id']}  <br> ".
         "Title: {$row['tutorial_title']} <br> ".
         "Author: {$row['tutorial_author']} <br> ".
         "Submission Date : {$row['submission_date']} <br> ".
         "--------------------------------<br>";
}

mysql_close($conn);
}
?>

<!--Action search for people -->
<form metho"post" action="">
		Search:<br>
		<input id="uname" type="text" tabindex="1" name="uname" maxlength='20' required></input>
		<br><br>
		<input name="add" type="submit" id="add" value="Search">
</form>
</body>
</html> 
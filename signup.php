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
$fname = $_POST['fname']
$lname = $_POST['lname']
$pass  = $_POST['password']
//image here

//make sure column names are correct
$sql = "INSERT INTO profile (firstname, lastname, password, UserName)
VALUES ('$fname', '$lname', '$pass', $uname)";

mysql_select_db('social');
$return_value = mysql_query($sql, $conn);
if(! $return_value)
{
	die('Just could not do it ' . mysql_error);
}


mysql_close($conn);

header('Location: http://ec2-52-33-146-51.us-west-2.compute.amazonaws.com/profile.php/');
}
?>

<form metho"post" action="<?php $_PHP_SELF?>">
		First Name:<br>
		<input id="fname" type="text" tabindex="1" name="fname" maxlength='20' required></input>
		<br>
		Last Name:<br>
		<input id="lname" type="text" tabindex="1" name="lname" maxlength='20' required></input>
		<br>
		User Name:<br>
		<input id="uname" type="text" tabindex="1" name="uname" maxlength='10' required></input>
		<br>
		Password:<br>
		<input id="password" type="text" tabindex="1" name="password" maxlength='20' required></input>
		<br><br>
		<input name="add" type="submit" id="add" value="Set Profile">
</form>
</body>
</html> 
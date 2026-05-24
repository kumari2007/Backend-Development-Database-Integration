<?php
session_start();
include("db.php");

if(!isset($_SESSION['user']))
{
header("Location:login.php");
exit();
}

$name=$_SESSION['user'];

if(isset($_POST['delete']))
{
$sql="DELETE FROM users
WHERE name='$name'";

mysqli_query($conn,$sql);

session_destroy();

echo "<script>
alert('Account Deleted Successfully');

window.location='register.php';
</script>";
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Delete Account</title>

<link rel="stylesheet"
href="assets/style.css">

</head>

<body>

<div class="container">

<h2>Delete Account 🗑️</h2>

<p style="text-align:center">
Are you sure?
</p>

<form method="POST">

<button
name="delete">

Yes Delete My Account

</button>

</form>

<br>

<a href="profile.php">

<button>
Cancel
</button>

</a>

</div>

</body>

</html>
<?php
session_start();
include("db.php");

if(isset($_POST['submit']))
{
$email=trim($_POST['email']);
$password=$_POST['password'];

$sql="SELECT * FROM users WHERE email='$email'";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1)
{
$row=mysqli_fetch_assoc($result);

if(password_verify($password,$row['password']))
{
$_SESSION['user']=$row['name'];

header("Location: dashboard.php");
exit();
}
else
{
echo "<script>
alert('Incorrect Password');
</script>";
}
}
else
{
echo "<script>
alert('User not found');
</script>";
}
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Login</title>

<link rel="stylesheet"
href="assets/style.css">

</head>

<body>

<div class="container">

<h2>Login</h2>

<form method="POST" autocomplete="off">

<input
type="email"
name="email"
placeholder="Enter Email"
required>

<input
type="password"
name="password"
placeholder="Enter Password"
required>

<button
name="submit">
Login
</button>
<p style="text-align:center;margin-top:15px;">
Don't have an account?
<a href="register.php"
style="color:#00c6ff;text-decoration:none;">
Register
</a>
</p>
</form>

</div>

</body>

</html>
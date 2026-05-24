<?php
include("db.php");

if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];

$password=$_POST['password'];
$confirm=$_POST['confirmPassword'];

if($password!=$confirm)
{
echo "<script>alert('Passwords do not match')</script>";
}
else
{
$hashed=password_hash($password,PASSWORD_DEFAULT);

$sql="INSERT INTO users(name,email,password)
VALUES('$name','$email','$hashed')";

if(mysqli_query($conn,$sql))
{
echo "<script>alert('Registration Successful')</script>";
}
else
{
echo "<script>alert('Email may already exist')</script>";
}
}
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="container">

<h2>Register</h2>
<form method="POST" onsubmit="return validatePassword()">

<input
type="text"
name="name"
placeholder="Enter Name"
required>

<input
type="email"
name="email"
placeholder="Enter Email"
required>

<input
type="password"
id="password"
name="password"
placeholder="Enter Password"
required>

<div id="strength"
style="margin-bottom:10px;text-align:left;">
</div>

<input
type="password"
name="confirmPassword"
placeholder="Confirm Password"
required>

<button
name="submit">
Register
</button>
<p style="text-align:center;margin-top:15px;">
Already have an account?
<a href="login.php"
style="color:#00c6ff;text-decoration:none;">
Login
</a>
</p>
</form>

</div>
<script>

function validatePassword()
{
let pass=document.getElementById("password").value;

let errors=[];

if(pass.length<8)
{
errors.push("Password should contain at least 8 characters");
}

if(!/[A-Z]/.test(pass))
{
errors.push("Add at least one uppercase letter");
}

if(!/[0-9]/.test(pass))
{
errors.push("Add at least one number");
}

if(!/[@$!%*?&]/.test(pass))
{
errors.push("Add at least one special character");
}

if(errors.length>0)
{
alert(
"Why your password is weak:\n\n"
+ errors.join("\n")
);

return false;
}

return true;
}

</script>

</body>
</html>
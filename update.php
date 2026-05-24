<?php
session_start();
include("db.php");

if(!isset($_SESSION['user']))
{
header("Location:login.php");
exit();
}

$name=$_SESSION['user'];

$sql="SELECT * FROM users WHERE name='$name'";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
$newname=$_POST['name'];
$newemail=$_POST['email'];

$updateQuery=
"UPDATE users
SET name='$newname',
email='$newemail'
WHERE name='$name'";

if(mysqli_query($conn,$updateQuery))
{
$_SESSION['user']=$newname;

echo "<script>
alert('Profile Updated Successfully');
window.location='profile.php';
</script>";
}
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Update Profile</title>

<link rel="stylesheet"
href="assets/style.css">

</head>

<body>

<div class="container">

<h2>Edit Profile ✏️</h2>

<form method="POST">

<input
type="text"
name="name"
value="<?php echo $row['name']; ?>"
required>

<input
type="email"
name="email"
value="<?php echo $row['email']; ?>"
required>

<button
name="update">
Update
</button>

</form>
<br>

<a href="profile.php">

<button type="button">
Back
</button>

</a>
</div>

</body>
</html>
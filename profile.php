<?php
session_start();
include("db.php");

if(!isset($_SESSION['user']))
{
header("Location: login.php");
exit();
}

$name=$_SESSION['user'];

$sql="SELECT * FROM users WHERE name='$name'";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>

<title>Profile</title>

<link rel="stylesheet"
href="assets/style.css">

</head>

<body>

<div class="container">

<h2>My Profile ✨</h2>

<p><b>Name:</b>
<?php echo $row['name']; ?>
</p>

<br>

<p><b>Email:</b>
<?php echo $row['email']; ?>
</p>

<br><br>

<a href="update.php">

<button>
Edit Profile
</button>

</a>

<br><br>

<a href="delete.php">

<button>
Delete Account
</button>

</a>

<br><br>

<a href="dashboard.php">

<button>
Back
</button>

</a>

</div>

</body>

</html>
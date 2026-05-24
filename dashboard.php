<?php
session_start();

if(!isset($_SESSION['user']))
{
header("Location: login.php");
exit();
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>

<link rel="stylesheet"
href="assets/style.css">

</head>

<body>

<div class="container">

<h2>Welcome <?php echo $_SESSION['user']; ?> 🎉</h2>

<p style="text-align:center;margin-top:20px;">
Login Successful
</p>

<br>

<a href="profile.php">

<button>
Profile
</button>

</a>

<br><br>

<a href="logout.php">

<button>
Logout
</button>

</a>

</div>

</body>

</html>
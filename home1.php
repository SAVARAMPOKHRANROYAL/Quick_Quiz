<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<div class="container">
<div id="home" class="flex-center flex-column">
     <h1>Hello <?php echo $_SESSION['name']; ?> sir,</h1>
     <a class= "btn" href="data_ret1.php">Subjects</a>
     <a class= "btn" href="logout.php">Logout</a>
</div>
</div>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
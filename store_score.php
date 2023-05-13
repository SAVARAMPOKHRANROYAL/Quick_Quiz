<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Quiz Score</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f7f7f7;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		.result {
			background-color: #fff;
			border: 1px solid #ddd;
			padding: 20px;
			margin-bottom: 20px;
			box-shadow: 2px 2px 5px #ccc;
		}
	</style>
</head>
<body>
	<h1>Quiz Score</h1>
	<?php
		// retrieve user name, quiz score, and subject name from form
		$user_name = $_POST["user_name"];
		$score = $_POST["score"];
		$subject_name = $_POST["subject"];

		// connect to database
		include "db_score.php";

		// insert score record into database
		$sql = "SELECT * FROM score WHERE user_name='$user_name' AND subject_name='$subject_name'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) 
		{
			echo "You already participated in the quiz..";
	    	exit();
		}
		else
		{
			$sql = "INSERT INTO score (user_name , subject_name , score) VALUES ('$user_name' , '$subject_name' , '$score')";
			if (mysqli_query($conn, $sql)) {
				echo "<div class='result'>";
				echo "<p>Your quiz score has been saved.</p>";
				echo "</div>";
			} else {
				echo "<div class='result'>";
				echo "<p>Error: " . mysqli_error($conn) . "</p>";
				echo "</div>";
			}
		}
		// close database connection
		mysqli_close($conn);
	?>
</body>
</html>

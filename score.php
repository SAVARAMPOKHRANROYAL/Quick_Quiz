<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Quiz Score</title>
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
		// connect to database
		include "db_questions.php";
		// retrieve questions and options from database
		$subject = $_POST['subject'];
		$sql = "SELECT id, correct_option FROM questions where subject_name = '$subject'";
		$result = mysqli_query($conn, $sql);

		// initialize score and total questions variables
		$score = 0;
		$total_questions = mysqli_num_rows($result);

		// loop through each question and check user answer
		echo "<form action='store_score.php' method='post'>";
		echo "<input type='hidden' name='subject' value='$subject'>";
		if (mysqli_num_rows($result) > 0) 
		{
			while ($row = mysqli_fetch_assoc($result)) {
				$question_id = $row["id"];
				$correct_option = $row["correct_option"];
				$user_answer = $_POST["answer_" . $question_id];
				if ($user_answer == $correct_option) {
					$score++;
				}
			}
		}

		// calculate percentage score
		$percentage_score = ($score / $total_questions) * 100;

		// display score result
		echo "<div class='result'>";
		echo "<p>You scored " . $score . " out of " . $total_questions . " questions.</p>";
		echo "<p>Your percentage score is " . $percentage_score . "%.</p>";
		echo "</div>";
		echo "<input type='hidden' name='score' value='$score'>";
		echo "<center> <input type='text' name='user_name' placeholder='User Name'> </center><br>";
		echo "<center> <input type='submit' name='submit' value='Submit'> </center>";
		echo "</form>";

		// close database connection
	?>
</body>
</html>
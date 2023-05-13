<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Quiz Questions</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f7f7f7;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		.question {
			background-color: #fff;
			border: 1px solid #ddd;
			padding: 20px;
			margin-bottom: 20px;
			box-shadow: 2px 2px 5px #ccc;
		}
		.options label {
			display: block;
			margin-bottom: 10px;
		}
		.options input[type="radio"] {
			margin-right: 10px;
		}
	</style>
</head>
<body>
	<h1>Quiz Questions</h1>
	<?php
		// connect to database
		include "db_questions.php";
        $participant_subject = $_POST['subject'];
		// retrieve questions and options from database
		$sql = "SELECT id, subject_name , question, option1, option2, option3, option4 FROM questions where subject_name = '$participant_subject'";
		$result = mysqli_query($conn, $sql);
		// display questions and options
		if (mysqli_num_rows($result) > 0) 
        {
			echo "<form action='score.php' method='post'>";
			echo "<input type='hidden' name='subject' value='$participant_subject'>";
			while ($row = mysqli_fetch_assoc($result)) 
            {
				echo "<div class='question'>";
				echo "<h3>" . $row["question"] . "</h3>";
				echo "<div class='options'>";
				echo "<label><input type='radio' name='answer_" . $row["id"] . "' value='A'> " . $row["option1"] . "</label>";
				echo "<label><input type='radio' name='answer_" . $row["id"] . "' value='B'> " . $row["option2"] . "</label>";
				echo "<label><input type='radio' name='answer_" . $row["id"] . "' value='C'> " . $row["option3"] . "</label>";
				echo "<label><input type='radio' name='answer_" . $row["id"] . "' value='D'> " . $row["option4"] . "</label>";
				echo "</div>";
				echo "</div>";
			}
            echo "<center> <input type='submit' name='submit' value='Submit'> </center>";
			echo "</form>";
		} 
        else 
        {
			echo "No questions found.";
		}

		// close database connection
		mysqli_close($conn);
	?>
</body>
</html>



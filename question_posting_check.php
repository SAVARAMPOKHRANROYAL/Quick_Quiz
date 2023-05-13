<?php 
session_start(); 
include "db_questions.php";

if (isset($_POST['sub_name']) && isset($_POST['question']) && isset($_POST['option1']) && isset($_POST['option2']) && isset($_POST['option3'])
&& isset($_POST['option4']) && isset($_POST['correct_option'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$sub_name = validate($_POST['sub_name']);
	$question = validate($_POST['question']);
    $option1 = validate($_POST['option1']);
    $option2 = validate($_POST['option2']);
    $option3 = validate($_POST['option3']);
	$option4 = validate($_POST['option4']);
	$correct_option = validate($_POST['correct_option']);

	$user_data = 'sub_name='. $sub_name. '&corrct_option='. $correct_option;


	if (empty($sub_name)) {
		header("Location: questions_sub.php?error=Subject Name is required&$user_data");
	    exit();
	}else if(empty($question)){
        header("Location: questions_sub.php?error=Question is required&$user_data");
	    exit();
	}
	else if(empty($option1)){
        header("Location: questions_sub.php?error=option1 is required&$user_data");
	    exit();
	}
	else if(empty($option2)){
        header("Location: questions_sub.php?error=option2 is required&$user_data");
	    exit();
	}
	else if(empty($option3)){
        header("Location: questions_sub.php?error=option3 is required&$user_data");
	    exit();
	}
    else if(empty($option4)){
        header("Location: questions_sub.php?error=option4 is required&$user_data");
	    exit();
	}
    else if(empty($correct_option)){
        header("Location: questions_sub.php?error=correct_option is required&$user_data");
	    exit();
	}

	else{

	    $sql = "SELECT * FROM questions WHERE subject_name='$sub_name' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 10) {
			header("Location: questions_sub.php?error=The subject name is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO questions(subject_name, question, option1,option2,option3,option4,correct_option) VALUES('$sub_name', '$question', '$option1','$option2','$option3','$option4','$correct_option')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: questions_sub.php?success=Your question has been stored successfully");
	         exit();
           }else {
	           	header("Location: questions_sub.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
}
else{
	header("Location: questions_sub.php");
	exit();
}
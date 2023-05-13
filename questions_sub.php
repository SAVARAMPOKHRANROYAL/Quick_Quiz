<!DOCTYPE html>
<html>
<head>
	<title>QUESTIONS POSTING</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
     <div style="display: flex;">
     <form action="question_posting_check.php" method="post">
     	<h2>Questions Posting</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Subject Name</label>
          <?php if (isset($_GET['sub_name'])) { ?>
               <input type="text" 
                      name="sub_name" 
                      placeholder="Name"
                      value="<?php echo $_GET['sub_name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="sub_name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>Question</label>
          <?php if (isset($_GET['question'])) { ?>
               <input type="text" 
                      name="question" 
                      placeholder="question"
                      value="<?php echo $_GET['question']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="question" 
                      placeholder="question"><br>
          <?php }?>


     	<label>OptionA</label>
     	<input type="text" 
                 name="option1" 
                 placeholder="optionA"><br>

        <label>OptionB</label>
        <input type="text" 
                 name="option2" 
                 placeholder="optionB"><br>
        
        <label>OptionC</label>
        <input type="text" 
                 name="option3" 
                 placeholder="optionC"><br>

        <label>OptionD</label>
        <input type="text" 
                 name="option4" 
                 placeholder="optionD"><br>

        <label>Correct Option(A/B/C/D)</label>
        <input type="text" 
                 name="correct_option" 
                 placeholder="correct_option"><br>



     	<button type="submit">Post Question</button>
          <a href="home1.php" class="ca">your profile</a>
          </form>
          </div>
</body>
</html>
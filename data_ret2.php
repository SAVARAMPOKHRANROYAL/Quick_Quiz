<?php
    include "db_score.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>
            Subjects on which you have conducted quiz....
        </title>
        <style>
            body{
                background-color: #1690A7;
            }
            table,tr,td{
                border: 1px solid black;
                width: 700px;
                background-color: #888;
            }
            .btn{
                background-color: #888;
                width: 200px;
                height: 30px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <center>
            <h1>Scores in each quiz..</h1>
            <h2>The score indicates our potential in each subject. </h2>
            <form action="" method="POST">
            <table>
                <tr>
                    <th>Subject Name</th>
                    <th>Scores</th>
                </tr>
                <input type="text"   name="user_name" placeholder="user name"><br><br>
                <input type="submit" class="btn" name="search" value="search data"><br><br>
            </form>
        </center>
    </body>
    <?php
        if (isset($_POST['search'])) {   
                $subject = $_POST['user_name'];
                $sql = "SELECT DISTINCT * FROM `score` where user_name = '$subject'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result))
                {?>
                <tr>
                <td> <?php echo $row['subject_name'] ?> </td>
                    <td> <?php echo $row['score'] ?> </td>
                </tr>
                <?php    
                }
            }        
    ?>
</html>
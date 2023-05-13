<?php
    include "db_questions.php";
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
            <h1>Subjects on which you have conducted quiz....</h1>
            <h2>We can't use same subject name again as it disturbs the database and question retrieval for quiz.</h2>
            <form action="" method="POST">
            <table>
                <tr>
                    <th>Subject Name</th>
                </tr>
                <input type="submit" class="btn" name="search" value="search data"><br><br>
            </form>
        </center>
    </body>
    <?php
        if (isset($_POST['search'])) {        
                $sql = "SELECT DISTINCT subject_name FROM `questions`";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result))
                {?>
                <tr>
                    <td> <?php echo $row[0] ?> </td>
                </tr>
                <?php    
                }
            }        
    ?>
</html>
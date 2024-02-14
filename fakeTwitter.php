<?php
/*******w******** 
    
    Name: Deborah Ekpeneidua
    Date: February 8, 2024
    Description: CRUD challenge (fake twitter)

****************/

require('connect.php');

//query to show latest rows first
$query = "SELECT * FROM tweets ORDER BY id DESC";
$statement = $db->prepare($query);

$statement->execute();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Fake Twitter</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
   

    <form method="POST" action="insert.php">
        <label for="tweet"></label>
        <input type="text" name="tweet" placeholder=" What's going on?" />
        <button type="submit">Tweet!</button>

        <?php while($row = $statement->fetch()):?>
            <ul>
                <?php if($row == 0 ): ?>
                    <li>There are no latest tweets at this time</li>

                <?php elseif ($row > 0): ?> 
                    <li><?= $row['status']?></li>
          
                <?php endif ?>
            </ul>
        <?php endwhile ?>
    </form>

</body>
</html>
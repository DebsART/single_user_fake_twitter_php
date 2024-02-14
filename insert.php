<?php
/*******w******** 
    
    Name: Deborah Ekpeneidua
    Date: February 8, 2024
    Description: CRUD challenge (fake twitter)

****************/

require('connect.php');


$status = filter_input(INPUT_POST, 'tweet', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if(isset($status) && strlen(trim($status)) > 140){
    $error = "Error: Tweet must be less than 140 characters.";
    echo $error;
} elseif (isset($status) && strlen(trim($status)) <= 140) {
    $query = "INSERT INTO tweets (status) VALUES (:status)";
    $statement = $db->prepare($query);

    //bind user tweet to status
    $statement->bindValue(':status', $status);

    if($statement->execute()){
        echo "Success";
    }

    //redirect back to faketwitter.php
    header("Location:fakeTwitter.php?");
    exit;
}

?>
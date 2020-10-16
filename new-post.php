<?php

include('db.php');


    if (isset($_POST['submit'])) {

        $title = $_POST['title'];
        $body = $_POST['body'];
        $author = $_POST['author'];
        $created_at = $_POST['vreme'];

            $sql = "INSERT INTO posts (title, body, author, created_at) Values ($title, $body, $author, $created_at)";

            $statement = $connection->prepare($sql);
            $statement->execute();
            header('Location: index.php');
        
       }
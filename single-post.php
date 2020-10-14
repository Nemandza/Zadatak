<?php
include('db.php');
?>
    <!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <!-- <link href="styles/blog.css" rel="stylesheet"> -->
    <link href="styles/styles.css" rel="stylesheet">
</head>

    
    <?php include ('header.php'); ?>
    <div class="va-l-container">
            <main class="va-l-page-content">
                <?php
                
                    if (isset($_GET['post_id'])) {
                        
                        $sql = "SELECT * FROM posts WHERE posts.id = {$_GET['post_id']}";
                        
                        $statement = $connection->prepare($sql);
    
                        
                        $statement->execute();

                        $statement->setFetchMode(PDO::FETCH_ASSOC);
    
                        $singlePost = $statement->fetch();
    
                            echo '<pre>';
                            // var_dump($singlePost);
                            echo '</pre>';
    
                ?>
        
                        <article class="va-c-article">
                            <header>
                                <h1 a class = "blog-post-title"><?php echo $singlePost['title'] ?></h1>

    
                                <div class="va-c-article__meta"><?php echo $singlePost['created_at'] ?> by <?php echo $singlePost['author'] ?></div>
                            </header>
    
                            <div>
                                <?php echo $singlePost['body'] ?>
                                
                    </div>
                     <?php } ?>
                    
                     <div class="comments">

                                <h3>Comments</h3> 
                                
                                <?php
                                
                                $sqlComments = "SELECT * from posts JOIN comments  ON comments.post_id = posts.id WHERE comments.post_id = {$_GET['post_id']}";
                              
                                    $statement = $connection->prepare($sqlComments);
                                
                                $statement->execute();

                                $statement->setFetchMode(PDO::FETCH_ASSOC);
    
                                $comments = $statement->fetchAll();
    
                                    echo '<pre>';
                                    // var_dump($comments );
                                    echo '</pre>';
                                
                                    foreach ($comments as $comment) {
                                ?>
                                    <li class="comment_item">
                                    

                                    <?php echo("Author: ".$comment['author']."<br>"); ?>

                                    <?php echo("Comment: ".$comment['text']); } ?>
                                    <br>
                                    </li>
                     <?php 
                     include('sidebar.php');
                     include('footer.php'); ?>
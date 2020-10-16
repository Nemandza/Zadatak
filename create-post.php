<?php
    include('db.php');

    if (isset($_POST['submit'])) {

        $title = $_POST['title'];
        $body = $_POST['body'];
        $author = $_POST['author'];
        $created_at = $_POST['vreme'];

            //$sql = "INSERT INTO posts (title, body, author, created_at) Values ($title, $body, $author, $created_at)";

            //$statement = $connection->prepare($sql);
            //$statement->execute();
           
            $sql = "INSERT INTO posts (title, body, author) values (:title, :body, :author)";
            $statement = $connection->prepare($sql);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':body',  $body);
            $statement->bindValue(':author', $author);
            $statement->execute();
       }
       
?>

<?php 
include('header.php');

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

<body>

<div class="col-sm-8 blog-main">
    <div class="blog-post">
        <form action="create-post.php" method="post" name="form" class="add-content wrapper">
            <label style="display-block" for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Naslov post-a">

            <br>

            <label style="display: block" for="body">Content</label>
            <textarea class="form_field_title_txt" name="body" id="body" placeholder="Sadrzaj post-a" rows="5" cols="50"> </textarea>

            <br>
            <label for="author">Autor</label>
            <input type="text" name="author" id="author" placeholder="Vase ime">

            <br>

            <label for="vreme">Vreme</label>
            <input type="text" name="vreme" id="vreme" placeholder="Datum">

           

            
            
            <input style="display: block" class="btn btn-default" type="submit" name="submit" value="Kreiraj post">

        </form>


<?php 
    include('sidebar.php');
    include('footer.php');
?>


<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>


<?php
                $sql1 ="SELECT *  FROM posts ORDER BY created_at DESC";
                $statement = $connection->prepare($sql1);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $posts = $statement->fetchAll();

                     echo '<pre>';
                    // var_dump($posts);
                     echo '</pre>';
                    

            ?>

<?php 
include('header.php');

?>

<?php
                foreach ($posts as $post){
            ?>
                <article class ="va-c-article">
                <header>
                            <h1><a class = "blog-post-title"href="single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['title']) ?></a></h1>

                            
                            <div class="va-c-article__meta"> <?php echo($post['created_at']) ?>  <?php echo($post['author']) ?></div>
                        </header>             
                        <div>
                            <p> <?php echo($post['body']) ?></p>
                        </div>
                        
                    </article>
                <?php }
                 include('sidebar.php');
                include('footer.php');
               
                ?>
<?php

require_once 'app/helpers.php';
my_start_session('ddd_blog');
$page_title = 'Add new post';
$error = '';



if( !verify_user() ){
    header('location: signin.php');
    exit;
}



if( isset($_POST['submit']) ){
    
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $title = trim($title);
    
    $article = filter_input(INPUT_POST, 'article', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $article = trim($article);
    
    if( ! $title ){
        $error = ' * Title field is required ';
    }elseif( ! $article ){
         $error = ' * Article field is required ';
    } else {
        
        $uid = $_SESSION['user_id'];
        $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
        $title = mysqli_real_escape_string($link, $title);
        $article = mysqli_real_escape_string($link, $article);
        $sql = "INSERT INTO posts VALUES(null, $uid, '$title', '$article', NOW())";
        $result = mysqli_query($link, $sql);
            if( $result && mysqli_affected_rows($link) > 0 ){
                
                header('location: blog.php?sm=Your post has been saved');
                exit;
                
            }

    }
    
}


?>


<?php include 'tpl/header.php'; ?>
<main>
    <div class="content">
        <h1><?= $page_title; ?> : </h1><br>
        <div class="box_new_post">
        
        <form method="POST" action="">

            <lable for="title">Title:</lable><br>
            <input type="text" name="title" id="title" value="<?= old('title') ?>" class="title_new_post"><br><br>

            <lable for="article">Article:</lable><br>
            <textarea name="article" id="article" class="article_new_post"><?= old('article'); ?></textarea>
            <br><br>
            <input type="submit" name="submit" value="Save post">
            <input class="btn" type="button" value="Cancel" onclick="window.location = 'blog.php';"><br><br>

            <span class="error"><?= $error; ?></span>

        </form>
       
       </div> 
    </div>
</main>
<?php include 'tpl/footer.php'; ?>



























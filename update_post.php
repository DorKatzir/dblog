<?php

require_once 'app/helpers.php';
my_start_session('ddd_blog');
$page_title = 'Edit your post';
$error = '';



if( ! verify_user() ){
    header('location: signin.php');
    exit;
}



$pid = filter_input(INPUT_GET, 'pid', FILTER_SANITIZE_STRING);
$pid = trim($pid);
$uid = $_SESSION['user_id'];

if( $pid && is_numeric($pid) ){
    
    $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
    $pid = mysqli_real_escape_string($link, $pid);
    $sql = "SELECT * FROM posts WHERE id = $pid AND user_id = $uid";
    $result = mysqli_query($link, $sql);
    
        if( $result && mysqli_num_rows($result) == 1 ){
            
            $post = mysqli_fetch_assoc($result); 
        } else {    
            header('location: blog.php');
            exit;
        }
    
} else {
    header('location: blog.php');
    exit;
}



if( isset($_POST['submit']) ){
	
    
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $title = trim($title);
    
    $article = filter_input(INPUT_POST, 'article', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $article = trim($article);
    
    $pid = filter_input(INPUT_GET, 'pid', FILTER_SANITIZE_STRING);
    $pid = trim($pid);
    
    
        if( ! $title ){
            $error = ' * Title field is required ';
        }elseif ( ! $article ) {
            $error = ' * Article is required ';
        }elseif ( ! $pid || !  is_numeric($pid) ) {
            header('location: blog.php');
            exit;
        } else {
            
            $uid = $_SESSION['user_id'];
            $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
            $title = mysqli_real_escape_string($link, $title);
            $article = mysqli_real_escape_string($link, $article);
            $sql = "UPDATE posts SET title = '$title', article = '$article' WHERE id = $pid AND user_id = $uid";
            
            $result = mysqli_query($link, $sql);
            
                if( $result ){
                    header('location: blog.php?sm=Your post has been updated');
                    exit;
                }         
        }  
}
?>


<?php include 'tpl/header.php'; ?>
<main>
    <div class="content">
        <h1><?= $page_title; ?>:</h1><br>
        <div class="box_new_post">   
             <form method="POST" action="">
                <lable for="title">Title:</lable><br>
                <input type="text" name="title" id="title" value="<?= $post['title']; ?>" class="title_new_post"/>
                <br<br>

                <lable for="article">Article:</lable><br>
                <textarea name="article" id="article" class="edit_post"><?= $post['article']; ?></textarea>
                <br><br>

                <input type="submit" name="submit" id="submit" value="Update post"/>
                <input type="button" value="Cancel" onclick=" window.location='blog.php'; " class="btn" />
                <br><br>
                <span class="error"><?= $error; ?></span>
            </form>  
        </div> 
    </div>
</main>
<?php include 'tpl/footer.php'; ?>





































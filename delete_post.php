<?php

require_once 'app/helpers.php';
my_start_session('ddd_blog');
$page_title = 'Delete post';

if( !verify_user() ){
    header('location: signin.php');
}


if( isset($_POST['submit']) ){
    
    $pid = filter_input(INPUT_GET, 'pid', FILTER_SANITIZE_STRING);
    $pid = trim($pid);
    
    if( $pid && is_numeric($pid) ){
        
        $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD,MYSQL_DB);
        $pid = mysqli_real_escape_string($link, $pid);
        $uid = $_SESSION['user_id'];
        $sql = "DELETE FROM posts WHERE id = $pid AND user_id = $uid";
        $result = mysqli_query($link, $sql);
        
            if( $result && mysqli_affected_rows($link) > 0 ){
                header('location: blog.php?sm=Your post has been successfully deleted');
            } else {
                header('location: blog.php');
            }
    }  
}

?>



<?php include 'tpl/header.php'; ?>
<main>
  <div class="content">
      <h1> <?= $page_title; ?> : </h1><br>
      <p>Are you sure you want to delete your post?</p>
        <form method="POST" action="">
          <input type="submit" name="submit" value="Yes! >> Delete post">
          <input type="button" value="No! Cancel" onclick="window.location = 'blog.php';">
        </form>
  </div>
</main>
<?php include 'tpl/footer.php'; 

















































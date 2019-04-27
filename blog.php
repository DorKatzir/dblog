<?php 

require_once 'app/helpers.php';
my_start_session('ddd_blog');
$page_title = 'Blog page';
$spacer = str_repeat('&nbsp;', 5) ;

if( !verify_user() ){
      header('location: signin.php');
      exit;
}

$uid = $_SESSION['user_id'];
$link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
$sql = "SELECT u.name,p.* FROM posts p "
        . "JOIN users u ON u.id = p.user_id "
        . "ORDER BY p.date DESC";
$result = mysqli_query($link, $sql);
$posts = [];
    if( $result && mysqli_num_rows($result) > 0 ){

        while($row = mysqli_fetch_assoc($result)){
            $posts[] = $row;
        }
    }

?>







<?php include 'tpl/header.php';?>
    <main>
        <div class="content">
            <h1><?= $page_title; ?></h1><br>
            <p><input type="button" value=" + Add a new post " onclick="window.location = 'add_post.php';"></p>
            <br>
            <?php if( $posts ): ?>
            <?php foreach($posts as $post): ?>
            <div class="post_box">
                <div class="post_txt">
              <h3><?= htmlentities($post['title']); ?></h3>
              <p><?= htmlentities($post['article']); ?></p>
               </div>
                <div class="details"> 
                    <span class="left">written by: <?= htmlentities($post['name']).$spacer; ?> on: <?= $post['date']; ?></span>
                <?php if( $uid == $post['user_id'] ): ?>
                <span class="right">
                    <a href="update_post.php?pid=<?= $post['id']; ?>">Edit</a> | 
					<a href="delete_post.php?pid=<?= $post['id']; ?>">Delete</a>
                </span>
                <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </main>
<?php include 'tpl/footer.php';?>
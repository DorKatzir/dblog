<?php
require_once 'app/helpers.php';
my_start_session('ddd_blog');
$page_title = "About Us";

?>




<?php include 'tpl/header.php';?>
    <main>
        <div class="content">
            <h1><?= $page_title; ?></h1><br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, rerum, facere, magni, nostrum consequatur officia accusamus corporis eos voluptate nesciunt veniam eius delectus at fuga quaerat illo distinctio libero harum.</p>
        </div>
    </main>
<?php include 'tpl/footer.php';?>
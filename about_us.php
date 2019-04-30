<?php
require_once 'app/helpers.php';
my_start_session('ddd_blog');
$page_title = "About dBlog";

?>




<?php include 'tpl/header.php';?>
    <main>
        <div class="content">
            <h1><?= $page_title; ?></h1><br>
            <p>Hello, my name is Dor Katzir, <br>
            This Dynamic Blog Website Created as a Mid-project for a PHP full stack web development course.
            Its is a highly secured Registration/Login System, craeted with these technologies: <br><br>
            
             - Vanila PHP<br>
             - MySQL DB<br>
             - jQuery JS<br>
             - Html Css/Sass<br>
            </p>                     
        </div>
    </main>
<?php include 'tpl/footer.php';?>
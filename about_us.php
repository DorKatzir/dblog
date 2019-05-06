<?php
require_once 'app/helpers.php';
my_start_session('ddd_blog');
$page_title = "About dBlog";

?>




<?php include 'tpl/header.php';?>
    <main>
        <div class="content">

            <h1><?= $page_title; ?></h1><br>
            <section>

                <article class="text-left">
                    <p>Hello, my name is Dor Katzir, <br>
                    dBlog is a dynamic Blog Website Created as a Mid-project for a PHP full stack web development course.
                    Its is a highly secured Registration/Login System, created with technologies as follows: <br><br>
                    </p>
                </article>

                <article class="text-right">
                    <p>
                     - Vanila PHP<br>
                     - MySQL DB<br>
                     - jQuery JS<br>
                     - Html Css<br>
                    </p>  
            </article>

            </section>
            
        </div>
    </main>
<?php include 'tpl/footer.php';?>
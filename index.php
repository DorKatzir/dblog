<?php
require_once 'app/helpers.php';
my_start_session('ddd_blog');
$page_title = "Home";

?>

<?php include 'tpl/header.php';?>
    <main>
        <div class="content">
            <h1>Wellcome to dBlog</h1><br>
           
            <div class="stages">
                <div class="infobox"><span>1</span><br><a href="signup.php"> Create <br> Account</a></div>
                <div class="infobox"><span>2</span><br><a href="signin.php"> Sign In <br> Account</a></div>
                <div class="infobox"><span>3</span><br><a href="blog.php"> Start <br> Blogging!</a></div>
            </div>
       

        </div>
    </main>
<?php include 'tpl/footer.php';?>
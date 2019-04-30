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
                <div class="infobox"><span>1</span><br> Create <br> your Account</div>
                <div class="infobox"><span>2</span><br> Sign In <br> to your Account</div>
                <div class="infobox"><span>3</span><br> Start <br> Blogging!</div>
            </div>
       



        </div>
    </main>
<?php include 'tpl/footer.php';?>
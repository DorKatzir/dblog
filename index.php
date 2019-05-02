<?php
require_once 'app/helpers.php';
my_start_session('ddd_blog');
$page_title = "Home";

?>

<?php include 'tpl/header.php';?>
    <main>
        <div class="content">
            <h1>Wellcome to dBlog</h1><br>
           <p>Follow these Steps:</p>
            <div class="stages">
                <div class="infobox" onclick="info1()"><span>1</span><br> Create <br> Account</div>
                <div class="infobox" onclick="info2()"><span>2</span><br> Sign In <br> Account</div>
                <div class="infobox" onclick="info3()"><span>3</span><br> Start <br> Blogging!</div>
            </div>
       

        </div>
    </main>
<?php include 'tpl/footer.php';?>
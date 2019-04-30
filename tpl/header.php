<!DOCTYPE html>
<html>
    <head>
        <title><?= $page_title; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
<body class="wrapper">
    <header>
       
        <nav>
            <ul class="ul_site">
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="blog.php">Blog</a></li>
            </ul>         
            <div class="nav_logo"><a href="./"><img class="logo" src="img/logo4.png" alt="Logo"></a></div>        
            <ul class="ul_user">
                <?php if( ! isset($_SESSION['user_id']) ): ?>
                <li><a href="signin.php">Sign In</a></li>
                <li><a href="signup.php">Create Account</a></li>
                <?php else: ?>
                <li>Hello, <?= htmlentities($_SESSION['user_name']); ?></li>
                <li><a href="logout.php">Logout</a></li>
                <?php endif; ?>
            </ul>
        </nav>

       
      <div class="succ">
      <?php if( isset($_GET['sm']) ): ?>
        <div class="sm-box">
          <p><?= $_GET['sm']; ?></p>
        </div>
      <?php endif; ?>
     </div>



    </header>
    <br><br>

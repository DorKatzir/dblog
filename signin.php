<?php
require_once 'app/helpers.php';
my_start_session('ddd_blog');


if( isset($_SESSION['user_id']) ){ 
      header('location: blog.php');
      exit; 
}


$page_title = "Sign In your account";
$error = '';



if( isset($_POST['submit']) ){
  
        if( isset($_SESSION['token']) && isset($_POST['token']) && $_SESSION['token'] == $_POST['token'] ){
            
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $email = trim($email);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $password = trim($password);
            
            if( ! $email ){
                  $error = ' * A valid email is required';
            }elseif( ! $password ){
                  $error = ' * Password field is required'; 
            }else {

                  $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
                  $email = mysqli_real_escape_string($link, $email);
                  $password = mysqli_real_escape_string($link, $password);
                  $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
                  $result = mysqli_query($link, $sql);

                  if( $result && mysqli_num_rows($result) == 1 ){

                        $user = mysqli_fetch_assoc($result);

                        if( password_verify($password, $user['password']) ){

                              $_SESSION['user_name'] = $user['name'];
                              $_SESSION['user_id'] = $user['id'];
                              $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
                              $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
                              header('location: blog.php?sm=Welcom back, ' . $user['name']);
                              exit;

                        } else {

                            $error = ' * Wrong email/password combination';
                        }

                  } else {

                    $error = ' * Wrong email/password combination';

                  }
            }     
        }
  
    $token = csrf_token();
  
} 
else { 
$token = csrf_token();
}

?>



<?php include 'tpl/header.php';?>
    <main>
        <div class="content">
            <h1><?= $page_title; ?></h1><br>
            
            <div class="box">
            <br>
            
            <form method="post" action="">
                
                <input type="hidden" name="token" value="<?= $token; ?>">
                
                <lable for="email">Email:</lable><br>
                <input type="text" name="email" id="email" value="<?= old('email'); ?>"/>
                <br><br>
                
                <lable for="password">Password:</lable><br>
                <input type="password" name="password" id="password"/>
                <br><br>
                
                <input type="submit" name="submit" value="Sign in"><br>
               <span class="error"><?= $error; ?></span>
            </form>
            
          </div> 
            
        </div>
    </main>
<?php include 'tpl/footer.php';?>
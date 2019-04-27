<?php
require_once 'app/helpers.php';
my_start_session('ddd_blog');


if( isset($_SESSION['user_id']) ){ 
      header('location: blog.php');
      exit; 
}


$page_title = "Create account";
$error['name'] = $error['email'] = $error['password'] = '';


if( isset($_POST['submit']) ){
  
        if( isset($_SESSION['token']) && isset($_POST['token']) && $_SESSION['token'] == $_POST['token'] ){
            
            $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
            
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $name = trim($name);
            
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $email = trim($email);
            $email = mysqli_real_escape_string($link, $email);
            
            
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $password = trim($password);
            $cpassword = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);
            $cpassword = trim($cpassword);
            
            $valid = true;
            
                if( ! $name || strlen($name) < 2 || strlen($name) > 100 ){
                    $valid = false;
                    $error['name'] = ' * Name field is required and must be 2 - 100 characters ';
                }
                
                
                if( ! $email ){
                    $valid = false;
                    $error['email'] = ' * A valid email is required';
                }elseif (email_exist($link, $email) ) {
                    $valid = false;
                    $error['email'] = ' *Email is already taken';
                }
                
                
                if( ! $password || strlen($password) < 6 || strlen($password) > 10 ){
                    $valid = false;
                    $error['password'] = ' * Password is required and must be 6-10 characters ';
                }elseif ( $password != $cpassword ) {
                    $valid = false;
                    $error['password'] = ' * Password and Confirm password must match ';
                }
                
                
                if( $valid ){
                    $name = mysqli_real_escape_string($link, $name);
                    $password = mysqli_real_escape_string($link, $password);
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $sql = "INSERT INTO users VALUES(null, '$name', '$email', '$password');";
                    $result = mysqli_query($link, $sql);
                        if( $result && mysqli_affected_rows($link) == 1 ){
                            header('location: signin.php?sm=Your account has been successfully created, Sign in with your account');
                            exit;
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
            <div class="acc">
            <p>Enter your details:</p><br>
            
            <form method="post" action="">
                
                <input type="hidden" name="token" value="<?= $token; ?>">
                
                <lable for="name">Name:</lable><br>
                <input type="text" name="name" id="name" value="<?= old('name'); ?>"/><br>
                <span class="error"><?= $error['name']; ?></span>
                <br>
                
                <lable for="email">Email:</lable><br>
                <input type="text" name="email" id="email" value="<?= old('email'); ?>"/><br>
                <span class="error"><?= $error['email']; ?></span>
                <br>
                
                <lable for="password">Password:</lable><br>
                <input type="password" name="password" id="password" class="pass"/>
                <br>
                <lable for="confirm-password">Confirm password:</lable>
                <input type="password" name="confirm_password" id="confirm-password" class="pass"/><br>
                <span class="error"><?= $error['password']; ?></span>
                <br>
                
                <input type="submit" name="submit" value="Create Account"><br>
              
            </form>
            
          </div> 
            
        </div>
    </main>
<?php include 'tpl/footer.php';?>
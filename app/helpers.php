<?php

define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PWD', '');
define('MYSQL_DB', 'dblog');



if( ! function_exists('old') ){
  
  function old($fn){
    return isset($_REQUEST[$fn]) ? $_REQUEST[$fn] : '';
  }
  
}




if( ! function_exists('csrf_token') ){
  
  function csrf_token(){
    $token = sha1( 'gfhhjcatchmeifyoiucanblog!' . date('y.d.m.H.i.s') . '$$!justsomemore#' . rand(1, 800) );
    $_SESSION['token'] = $token;
    return $token;
  }
  
}




if( ! function_exists('verify_user') ){
  
  function verify_user(){
    
    $valid = false;
    
        if( isset( $_SESSION['user_id']) ){

          if( $_SESSION['user_ip'] == $_SERVER['REMOTE_ADDR'] ){

            if( $_SESSION['user_agent'] == $_SERVER['HTTP_USER_AGENT'] ){

              $valid = true;
              session_regenerate_id();

            }
          }
        }
    return $valid;
  } 
}



if( ! function_exists('my_start_session') ){
  
  function my_start_session($name = null){

        if( ! is_null($name) ){

          session_name($name);

        }
    session_start();
  } 
}






if( !function_exists('email_exist') ){ 
  function email_exist($link, $email){
    
        $exist = false;

        $sql = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($link, $sql);

        if( $result && mysqli_num_rows($result) > 0 ){
          $exist = true;
        }
    
    return $exist;  
  } 
}




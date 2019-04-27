<?php
require_once 'app/helpers.php';
my_start_session('ddd_blog');
session_destroy();
header('location: signin.php');
exit;

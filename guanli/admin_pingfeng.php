<?php
  if(!isset($_COOKIE['name']))
  {
    header("location:login.php");
    exit;
 }
 header('Location: http://yyqn.sinaapp.com/pingfeng/admin.php');
 ?>
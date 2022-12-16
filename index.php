<?php
    error_reporting(0);
    switch ($_GET['page']) {
    default:
        include "home.php";
        break;
    case "home";
        include 'home.php';
        break;
    case "login";
        include "login.php";
        break;
    case "login-val";
        include "prosesLoginRegistser.php";
        break;
    case "dashoboard";
        include "../dashboard";
        break;
        

}
?>
<?php 
    setcookie('id', $_GET['id'], time() + 5, "/");
    header("Location: index.php");
?>
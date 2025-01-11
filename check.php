<?php
if ($_SESSION['role'] === "admin") { 
        header('Location: empl_menu_admin.php'); 
    }else{ 
        header('Location: empl_menu_new.php');  
    } 


?>
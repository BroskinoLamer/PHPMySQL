<?php
    session_start();
    if (isset($_SESSION['autenticato'])){
        echo "Connesso";
        session_destroy();
    }
    else{
        echo "Non Connesso";   
    }
?>
<?php

    session_start();
    session_unset();
    session_destroy();

    echo "<script> alert('----!!USER LOGGED OUT!!----') </script>";
    header('Location: index.php');

?>
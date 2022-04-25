<?php

    session_destroy();
    unset($_SESSION['Username']);
    header("Location:login.html");

?>
<?php

session_start();
unset($_SESSION["usernameID"]);
session_destroy();

header("Location: ../index.php");
?>
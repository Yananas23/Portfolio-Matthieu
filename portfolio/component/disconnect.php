<?php

include 'connect.php';

session_start();
unset($_SESSION['admin_id']);
session_unset();
session_destroy();

?>
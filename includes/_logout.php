<?php
session_start();
session_unset();
session_destroy();
header("location: ../pages/signin.php");
exit;

<?php
session_start();
require_once('../db/dbConnect.php');
require_once('../db/DBUser.php');

$db = new DBUser($conn);


?>
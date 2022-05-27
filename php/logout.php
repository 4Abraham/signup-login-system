<?php
if(isset($_POST["logout-btn"])){
require("db.php");
session_start();
session_unset();
session_destroy();
header("location: ../index.html?loggedout");
}
<?php
session_start();

require_once 'env.php';
require_once 'app/controllers/StudentController.php';
echo getStudent();


?>
<?php
session_start();
 require_once 'helpers.php';

 if (!isset($_SESSION['user'])){
     redirect('auth/login.php');
 }

<?php
// =========================================================
//  This code allows us to login our phonebook
//  
//  This code is part of a simple phone notebook project to
//  be a example of code project of my portfolio
//  Name: Hamilton G, Jr - System Engineer
// =========================================================

// connection
require_once 'db_connect.php';

// session initialization
session_start();
session_unset();
session_destroy();
header('Location: login.php');

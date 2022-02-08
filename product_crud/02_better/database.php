<?php

$servername = 'localhost';
$username   = 'root';
$password   = '';
$db_name    = 'products_crud';

$pdo = new PDO("mysql:host=$servername;port=3306;dbname=$db_name", $username, $password);
// set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

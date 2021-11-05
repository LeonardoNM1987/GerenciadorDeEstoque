<?php
declare(strict_types=1);
if(!isset($_SESSION)){session_start();} 


$tipoBanco = 'mysql';
$host ='localhost';
$database="db_php";
$user = 'root';
$password = '200248';

$produto = new Produto($tipoBanco, $host, $database, $user, $password);


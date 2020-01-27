<?php
session_start();

$hostname="localhost";
$username="root";
$password="";
$dbname="escapade";

try
{
    $bdd = new PDO('mysql:host='.$hostname.';dbname='.$dbname.';charset=utf8', $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

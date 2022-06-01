<?php
ini_set('display_errors', 1);

spl_autoload_register(function($file){
  require ("$file.php");
});

$init = new Classes\Init;
$connection = $init->connection();

$page = new Classes\Controller($connection);

$urlpage = $_GET["page"]??false ? $_GET["page"] : 'render';

$page->$urlpage();

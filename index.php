<?php
ini_set('display_errors', 1);
//A Nézet renderelése
spl_autoload_register(function($file){
  require ("$file.php");
});

$init = new Classes\Init;
$connection = $init->connection();

$page = new Classes\Controller($connection);

$page->render();

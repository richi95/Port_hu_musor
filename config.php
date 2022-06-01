<?php
//ini_set('display_errors', '1');
date_default_timezone_set('Europe/Budapest');

require 'Connect.php';

if (mysqli_num_rows($connection->query("SELECT * FROM musorok")) == 0 || isset($_GET['date'])) {
  require 'DatabaseSeeder.php';
}

$query_channels = $connection->query("SELECT DISTINCT `csatorna_neve` FROM `musorok`");
$query_shows = $connection->query("SELECT `musor_cime`, `rovid_leiras`, `musor_kezdete`, `korhatar` FROM `musorok` WHERE `csatorna_neve`='RTL Klub' ORDER BY `musor_kezdete`");
$query_date = $connection->query("SELECT DISTINCT `datum` FROM `musorok`");

if (!empty($_POST)) {
  $channel_name = $_POST['channel_name'];
  $query_shows = $connection->query("SELECT `musor_cime`, `rovid_leiras`, `musor_kezdete`, `korhatar` FROM `musorok` WHERE `csatorna_neve`='$channel_name'  ORDER BY `musor_kezdete`");
}
$result_date = strtotime($query_date->fetch_assoc()['datum']);
$result_date = date('Y-m-d', $result_date);

if($result_date != date('Y-m-d') && empty($_POST)){
  require 'DatabaseSeeder.php';
}
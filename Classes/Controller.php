<?php

namespace Classes;

class Controller extends Queries
{

  public function __construct($connection)
  {
    date_default_timezone_set('Europe/Budapest');
    $this->connection = $connection;
    $this->setQueries();
  }

  function render()
  {
    require './Views/main.php';
  }
}

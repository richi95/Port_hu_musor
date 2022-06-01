<?php

namespace classes;

class Controller extends Queries{
  

  public function __construct($connection)
  {
    date_default_timezone_set('Europe/Budapest');
    $this->connection = $connection;
    $this->setQueries();
  }

  function render()
  {
    require './views/main.php';
  }

}

<?php

namespace Classes;

class Queries extends DatabaseSeeder
{

    public $query_date;
    public $result_date;
    public $query_channels;
    public $query_shows;
    public $channel_name;

    public function setQueries()
    {
        $this->query_date = $this->connection->query("SELECT DISTINCT `datum` FROM `musorok`");
        $this->result_date = strtotime($this->query_date->fetch_assoc()['datum']);
        $this->result_date = date('Y-m-d',  $this->result_date);

        if ($this->result_date != date('Y-m-d') && empty($_POST)) {
            $this->seedShows();
        }

        if (mysqli_num_rows($this->connection->query("SELECT * FROM musorok")) == 0 || isset($_GET['date'])) {
            $this->seedShows();
        }

        $this->query_channels = $this->connection->query("SELECT DISTINCT `csatorna_neve` FROM `musorok`");
        $this->query_shows = $this->connection->query("SELECT `musor_cime`, `rovid_leiras`, `musor_kezdete`, `korhatar` FROM `musorok` WHERE `csatorna_neve`='RTL Klub' ORDER BY `musor_kezdete`");
        $this->query_date = $this->connection->query("SELECT DISTINCT `datum` FROM `musorok`");

        if (!empty($_POST)) {
            $this->channel_name = $_POST['channel_name'];
            $this->query_shows = $this->connection->query("SELECT `musor_cime`, `rovid_leiras`, `musor_kezdete`, `korhatar` FROM `musorok` WHERE `csatorna_neve`='$this->channel_name'  ORDER BY `musor_kezdete`");
        }
        if (empty($_POST)) {
            $this->channel_name = 'RTL Klub';
        }

        $this->result_date = strtotime($this->query_date->fetch_assoc()['datum']);
        $this->result_date = date('Y-m-d',  $this->result_date);
    }
}

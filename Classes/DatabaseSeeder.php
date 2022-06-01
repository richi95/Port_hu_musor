<?php

namespace classes;

class DatabaseSeeder
{

    public function seedShows()
    {
        if (isset($_GET['date'])) {
            $date = $_GET['date'];
        } else {
            $date = date('Y-m-d');
        }

        $url = "https://port.hu/tvapi?channel_id[]=tvchannel-5&channel_id[]=tvchannel-3&channel_id[]=tvchannel-21&channel_id[]=tvchannel-6&channel_id[]=tvchannel-103&date=$date";

        $content = file_get_contents($url);
        $content = json_decode($content);

        if (mysqli_num_rows($this->connection->query("SELECT * FROM musorok")) > 0) {
            $this->connection->query("TRUNCATE TABLE musorok");
        }

        foreach ($content->channels as $channel) {
            foreach ($channel->programs as $program) {

                $channel_name = $channel->name;
                $show_start = $program->start_time;
                $show_start = strtotime($program->start_time);
                $show_start = date('H:i', $show_start);
                $show_title = $program->title;
                $description = $program->short_description;
                $age_limit = $program->restriction->age_limit;
                $channel_date = strtotime($content->date_from);
                $channel_date = date('Y-m-d', $channel_date);

                $this->connection->query("INSERT INTO musorok (csatorna_neve, musor_kezdete, musor_cime, rovid_leiras, korhatar, datum) 
                VALUES ('$channel_name', '$show_start', '$show_title', '$description', '$age_limit', '$channel_date')");
            }
        }
    }
}

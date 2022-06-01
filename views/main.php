<?php
// require 'queries.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="favicon.svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Port Műsor</title>
  <script defer src="scripts.js"></script>
</head>

<body>
  <div class="container">
    <div class="background bg-white">
      <table class="table table-sm table-striped">
        <thead>
          <form action="<?php print $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="d-flex justify-content-between my-3 align-items-center">
              <div>
                <!--Csatornák-->
                <?php while ($row = $this->query_channels->fetch_assoc()) : ?>
                  <button class="btn channels-buttons <?php $this->channel_name == $row['csatorna_neve'] ? print 'btn-danger' : '' ?>" type="submit" name="channel_name" value="<?= $row['csatorna_neve'] ?>"><?= $row['csatorna_neve'] ?></button>
                <?php endwhile; ?>
              </div>
              <div>
                <h4 class="m-0"><?= $this->result_date == date('Y-m-d') ? 'MAI MŰSOROK' : $this->result_date . '. MŰSOROK' ?></h4>
              </div>
              <div>
                <!--Időpont választó-->
                <input class="form-control" id="date" type="date" name="date" min="<?= date('Y-m-d', time() - 3600 * 24 * 2); ?>" max="<?= date('Y-m-d', time() + 3600 * 24 * 11); ?>" value="<?php $this->result_date == date('Y-m-d') ? print date('Y-m-d') : print $this->result_date ?>">
              </div>
            </div>
          </form>
          <tr>
            <th>Műsor címe</th>
            <th>Rövid leírás</th>
            <th>Műsor kezdete</th>
            <th>Korhatár</th>
          </tr>
        </thead>

        <tbody>
          <!--Műsorok listázása-->
          <?php while ($shows = $this->query_shows->fetch_assoc()) : ?>
            <tr>
              <td><?= $shows['musor_cime'] ?></td>
              <td><?= $shows['rovid_leiras'] ?></td>
              <td><?= date('H:i', strtotime($shows['musor_kezdete']))  ?></td>
              <td><?= $shows['korhatar'] ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>

      </table>
    </div>
  </div>

</body>

</html>
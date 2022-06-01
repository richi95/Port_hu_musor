<?php
 require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="provider_tv.svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Port Műsor</title>
  <script defer src="scripts.js"></script>
</head>

<body>
  <div class="container">
    <table class="table table-striped">
      <thead>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="d-flex justify-content-between my-3 align-items-center">
            <div>
              <?php while ($row = $query_channels->fetch_assoc()) : ?>
                <button class="btn channels-buttons <?php $channel_name == $row['csatorna_neve'] ? print 'btn-danger' : '' ?>" type="submit" name="channel_name" value="<?= $row['csatorna_neve'] ?>"><?= $row['csatorna_neve'] ?></button>
              <?php endwhile; ?>
            </div>
            <div>
              <h4 class="m-0"><?= $result_date; ?>. Műsorok</h4>
            </div>
            <div>
              <input class="form-control" id="date" type="date" name="date" min="<?= date('Y-m-d', time() - 3600 * 24 * 2); ?>" max="<?= date('Y-m-d', time() + 3600 * 24 * 11); ?>" value="<?php $result_date == date('Y-m-d') ? print date('Y-m-d') : print $result_date ?>">
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
        <?php while ($shows = $query_shows->fetch_assoc()) : ?>
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
</body>

</html>
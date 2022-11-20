<?php header("Cache-Control: public, max-age=86400, stale-while-revalidate=30"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>top | shurl</title>
</head>

<body>
  <?php include 'nav.php'; ?>

  <h4>updated at: <?php echo date('Y-m-d H:i:s'); ?></h4>

  <table border="1">
    <thead>
      <tr>
        <th>alias</th>
        <th>url</th>
        <th>visits</th>
        <th>expires</th>
        <th>created</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once 'db.php';

      $query = $db->query("SELECT * FROM `ShortUrl` WHERE `public` = '1' ORDER BY `visits` DESC, `createdAt` DESC LIMIT 20");

      while ($row = $query->fetch_assoc()) {
      ?>
        <tr>
          <td><a href="/<?php echo $row['alias']; ?>"><?php echo $row['alias']; ?></a></td>
          <td><a href="<?php echo $row['url']; ?>"><?php echo $row['url']; ?></a></td>
          <td><?php echo $row['visits']; ?></td>
          <td><?php echo @$row['expires'] ?: 'never'; ?></td>
          <td><?php echo $row['createdAt']; ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</body>

</html>
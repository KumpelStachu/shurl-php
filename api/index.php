<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>create | shurl</title>
</head>

<body>
  <?php
  include 'nav.php';
  // header("Cache-Control: public, max-age=31536000");
  ?>

  <form method="POST">
    <h2>create shurl</h2>

    <?php
    require_once 'Cuid.php';
    if (isset($_POST['create']) && isset($_POST['alias']) && isset($_POST['url'])) {
      require_once 'db.php';

      try {
        $db->query(sprintf(
          'INSERT INTO `ShortUrl` (`id`, `alias`, `url`, `public`, `expires`, `password`) VALUES ("%s", "%s", "%s", "%s", %s, %s)',
          EndyJasmi\Cuid::cuid(),
          $db->real_escape_string($_POST['alias']),
          $db->real_escape_string($_POST['url']),
          isset($_POST['public']) ? '1' : '0',
          strlen($_POST['date']) ? '"' . $db->real_escape_string($_POST['date']) . (strlen($_POST['time']) ? ' ' . $_POST['time'] : ' ') . '"' : 'NULL',
          strlen($_POST['password']) ? '"' . $db->real_escape_string($_POST['password']) . '"' : 'NULL',
        ));

        $new = $db->real_escape_string($_POST['alias']);
        echo '<h3>created <a href="/' . $new . '">' . $new . '</a></h3>';
      } catch (\Throwable $th) {
        echo '<h3>error while creating shurl :(</h3>';
      }
    }
    ?>

    <label for="url">url</label>
    <input type="url" name="url" id="url" placeholder="url" required>
    <br>
    <label for="alias">alias</label>
    <input type="text" name="alias" id="alias" placeholder="alias" required value="<?php echo EndyJasmi\Cuid::slug(); ?>">
    <br>
    <label for="date">expires</label>
    <input type="date" name="date" id="date" placeholder="date">
    <input type="time" name="time" id="time" placeholder="time">
    <br>
    <label for="password">password</label>
    <input type="password" name="password" id="password" placeholder="password" disabled>
    <br>
    <input type="checkbox" name="public" id="public" checked>
    <label for="public">public</label>
    <br>
    <input type="submit" value="create" name="create">
  </form>
</body>

</html>
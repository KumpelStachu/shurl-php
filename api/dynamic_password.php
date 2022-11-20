<?php header('Cache-Control: private') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $row['password'] ?> | shurl</title>
</head>

<body>
  <form method="post">
    <h2>password required</h2>
    <?php if (isset($_POST['password'])) echo '<h4>incorrect password</h4>' ?>
    <label for="password">password</label>
    <input type="password" name="password" id="password" required placeholder="password">
    <br>
    <input type="submit" value="enter">
  </form>
</body>

</html>
<?php
if (count(explode("/", $ROUTE)) > 2) {
  include 'not_found.php';
  return;
}

require_once 'db.php';

$alias = $db->real_escape_string(explode("/", $ROUTE)[1]);
$query = $db->query(sprintf('SELECT * FROM `ShortUrl` WHERE `alias` = "%s"', $alias));

if ($query && $query->num_rows == 1) {
  $row = $query->fetch_assoc();

  if ($row['password'] != null && $row['password'] != @$_POST['password']) {
    include 'dynamic_password.php';
    return;
  }

  $db->query(sprintf('UPDATE `ShortUrl` SET `visits` = %d WHERE `alias` = "%s"', intval($row['visits']) + 1, $alias));

  // header("Cache-Control: public, max-age=31536000, immutable");
  header("Location: $row[url]");
  return;
}

include 'not_found.php';

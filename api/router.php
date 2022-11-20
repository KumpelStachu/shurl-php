<?php
$ROUTE = $_SERVER['PHP_SELF'];
$ROUTES = [
  "/" => "index.php",
  "/index.php" => "index.php",
  "/top" => "top.php",
  "/top.php" => "top.php",
  "/recent" => "recent.php",
  "/recent.php" => "recent.php",
];

include @$ROUTES[$ROUTE] ?: 'dynamic.php';

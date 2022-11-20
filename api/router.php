<?php
$ROUTE = $_SERVER['PHP_SELF'];
$ROUTES = [
  "/" => "index.php",
  "/index" => "index.php",
  "/top" => "top.php",
  "/recent" => "recent.php",
];

include @$ROUTES[$ROUTE] ?: @$ROUTES["$ROUTE.php"] ?: 'dynamic.php';

<?php
$db = mysqli_init();
$db->ssl_set(NULL, NULL, @$_ENV['DB_CERT'], NULL, NULL);
$db->real_connect(
  @$_ENV['DB_HOST'] ?: 'localhost',
  @$_ENV['DB_USER'] ?: 'root',
  @$_ENV['DB_PASS'] ?: '',
  @$_ENV['DB_NAME'] ?: 'shurl',
  @$_ENV['DB_PORT'] ?: '3306',
);
$db->set_charset('utf8');

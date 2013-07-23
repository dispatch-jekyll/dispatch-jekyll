<?php
session_start();
error_reporting(0);
require 'config.php';
require 'functions.php';
?>
  <h1><a href="/">juic</a></h1>
  <p>manages your content</p>
<?php

route($_GET['q']);

?>

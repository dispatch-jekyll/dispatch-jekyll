<?php
session_start();
error_reporting(0);
require 'config.php';
?>
  <h1>juic</h1>
  <p>manages your content</p>
<?php

if($_SESSION['access_token']!=''){
    $data = file_get_contents("https://api.github.com/user?access_token=".$_SESSION['access_token']);
    $resp = json_decode($data);

    echo "<h2>Hello, $resp->name</h2>";
    ?>

    <h3>My Sites:</h3>
    <?php
    $data = file_get_contents("https://api.github.com/user/repos?access_token=".$_SESSION['access_token']);
    $resp = json_decode($data);
    echo "<ul>";
    foreach ($resp as $repo) {
        $owner = $repo->owner->login;
        $repoURL = $repo->name;
        echo "<li><a href='/$repoURL'>$repoURL</a></li>";
    }
    echo "</ul>";
    echo "<a href='/logout.php'>Logout</a>";
  } else{
    echo '<a href="/login.php">Login with Github</a>';
  }
?>

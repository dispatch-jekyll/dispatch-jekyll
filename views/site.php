<h2>Name of your site: <a href='/<?php echo $siteName; ?>'><?php echo $siteName; ?></a></h2>

<h3>Recent Posts:</h3>
<?php

  $data = file_get_contents("https://api.github.com/repos/$siteName/contents/_posts?access_token=".$_SESSION['access_token']);
    $resp = json_decode($data);
    echo "<pre>";
    echo "<ul>";
    foreach ($resp as $post) {
    	echo "<li><a href='/$siteName/$post->name'>$post->name</a></li>";
    }
    echo "</ul>";
?>

<h3>Pages:</h3>
** Should Retireve each (.*).html in repo doc root.
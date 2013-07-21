<h1>JuiCMS</h1>
<pre>
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
  	//print_r($resp);
  	echo "<ul>";
  	foreach ($resp as $repo) {

  		//print_r($repo);
  		$owner = $repo->owner->login;
  		$repoURL = $repo->name;
  		echo "<li><a href='/$repoURL'>$repoURL</a></li>";
  		//$data = file_get_contents("https://api.github.com/repos/".$owner."/".$repoURL."/contents/?access_token=".$_SESSION['access_token']);
	  	//$resp = json_decode($data);
	  	//print_r($resp);
  		//die;
  		echo "<hr>";
  	}
  	echo "</ul>";
  	echo "<a href='/logout'>Logout</a>";
  } else{
  	echo '<a href="/login">Login with Github</a>';
  }
?>

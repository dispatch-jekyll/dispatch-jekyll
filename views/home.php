<?php 
  var_dump($_SESSION);
?>

<h1>JuiCMS</h1>
<pre>
<?php 
  if($_SESSION['access_token']!=''){
  	$data = file_get_contents("https://api.github.com/user?access_token=".$_SESSION['access_token']);
  	print_r(json_decode($data));
  	echo "<a href='/logout'>Logout</a>";
  } else{
  	echo '<a href="/login">Login with Github</a>';
  }
?>

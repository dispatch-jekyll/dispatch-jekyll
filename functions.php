<?php

//URL Parsing

// everything in the URL is rewritten to ?q=.

function route($query){
	if ($query==''){
		// show some home stuff
		include('views/home.php');
	} else {
		$query = explode('/',$query);
		//print_r($query);
		$owner = $query[0];
		$repo = $query[1];
		$file = $query[2];
		$siteName = $owner.'/'.$repo;
		if($file){
			include('views/single.php');
		} else{
			include('views/site.php');
		}
	}
}

?>
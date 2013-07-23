<h2>Name of your site: <a href='/<?php echo $siteName; ?>'><?php echo $siteName; ?></a></h2>
this is single
<textarea name="" id="" cols="30" rows="10">
<?php
  $data = file_get_contents("https://api.github.com/repos/$siteName/contents/_posts/$file?access_token=".$_SESSION['access_token']);
    $resp = json_decode($data);
   
    echo base64_decode($resp->content);
?>
</textarea>
<h3>Pages:</h3>
** Should Retireve each (.*).html in repo doc root.
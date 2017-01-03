<?php

$json = file_get_contents('https://api.nasa.gov/planetary/apod?api_key=YOUR_API_KEY');
   $contents = utf8_encode($json); 
   $obj = json_decode($json);
   $mType = $obj->{'media_type'};
   $ti =  $obj->{'title'};
   $cdate = $obj->{'date'};
   $escdesc = $obj->{'explanation'};
   $imglink = $obj->{'url'};  
   $hdimglink = $obj->{'hdurl'};  
   
?>

<!DOCTYPE html>
<html>
<head>
<title>Nasa API</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="description" content="A PHP script to retrieve and display the NASA image of the day and its associated information."/>
<meta name="author" content="Sean Farnon"/>
<!--<link rel="stylesheet" type="text/css" href="" media="all" />-->                
</head>
<body>
<div style="margin-left: 200px;padding:30px;background:gray;width:850px;">
<h3><?php echo($ti); ?></h3>
<h5><?php echo($cdate); ?></h5><br />
<p><?php echo($escdesc); ?></p>

<?php 
if($mType === 'video'){ ?>
<iframe src ="<?php echo($imglink); ?>" width="400" height="500" title="<?php echo($ti); ?>">
</iframe>
<?php
}else{
?>
<p>Original</p>
<img src ="<?php echo($imglink); ?>" width="400" height="500" title="<?php echo($ti); ?>" />
<p>HD</p>
<img src ="<?php echo($hdimglink); ?>" width="400" height="500" title="<?php echo($ti); ?>" />
<?php } ?>
</div>
</body>
</html>
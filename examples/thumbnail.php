<?php

include("../cbImage.php");
include("../ImageResizer.class.php");
$c = new Image("cars.jpg");
$r = new ImageResizer($c);

//print_r($c->getType());


//$r->scalePercentage(80);
$r->Thumbnail(200,200);
$r->show();


?>
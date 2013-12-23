<?php

include("../cbImage.php");
include("../ImageResizer.class.php");
$c = new Image("cars.jpg");
$r = new ImageResizer($c);

//print_r($c->getType());


//$r->scalePercentage(80);
$r->ScalePercentage(10); // means  10% of real size of image
$r->show();


?>
<?php

include("../cbImage.php");
include("../ImageResizer.class.php");
$c = new Image("cars.jpg");
$r = new ImageResizer($c);

//print_r($c->getType());


//$r->scalePercentage(80);
$r->Save("test.jpg",100) // save with name test.jpg with  100% of quality original



?>
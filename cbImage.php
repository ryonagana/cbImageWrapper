<?php


header("Content-Type: image/jpeg");


class Image {

	private $info;
	private $image;
	
	private $image_width, $image_height;
	private $image_type;
	private $image_path;

	public function Image($path){

		$this->image_path = realpath($path);
		$this->info = getimagesize($this->image_path);
		$this->image_type  = $this->info['mime'];
		$this->image_width = $this->getWidth();
		$this->image_height = $this->getheight();

		switch($this->type){

			case 'image/jpeg':
				$this->image = imagecreatefromjpeg($path);
				break;

			default:
				$this->image = imagecreatefromjpeg($path);

		}

		

	}


	public function getImage(){
		return $this->image;
	}

	public function setImage($imageinstance){

		$this->image  = $imageinstance;
	}

	public function getType(){
		return $this->image_type;
	}

	public function getInfo(){
		return $this->info;
	}

	public function getWidth(){
		return $this->info[0];
	}

	public function getHeight(){
		return $this->info[1];
	}

}



?>
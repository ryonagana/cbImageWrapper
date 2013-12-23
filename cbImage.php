<?php
/*
    PHP Image Wrapper, to manipulate images using PHP
    Copyright (C) 2011  ryonagana

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>
	
	THERE IS NO WARRANTY FOR THE PROGRAM, TO THE EXTENT PERMITTED BY APPLICABLE LAW. EXCEPT WHEN OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES PROVIDE THE PROGRAM “AS IS” WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU. SHOULD THE PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION.
	
*/

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
<?

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
class ImageResizer   {
	
	
	private $originalImg;
	public $imgHandler;
	
	
	public function __construct($img ){
		
		$this->imgHandler = clone $img;
		$this->originalImg = $this->imgHandler;
		
	}
	
	private function Resize($width, $height){
		
		$cp = imagecreatetruecolor($width, $height);
		imagecopyresampled($cp, $this->imgHandler->getImage(), 0,0,0,0, $width, $height, $this->imgHandler->getWidth(), $this->imgHandler->getHeight());
		$this->imgHandler->setImage($cp);
			
	}
	
	private function ResizeFull($width, $height, $dst_x = 0, $dst_y = 0, $src_x = 0, $src_y = 0 ){
		
		$cp = imagecreatetruecolor($width, $height);
		
		imagecopyresampled($cp, $this->imgHandler->getImage(),$dst_x,$dst_y,$src_x,$src_y, $this->imgHandler->getWidth(), $this->imgHandler->getHeight(), $width, $height);
		$this->imgHandler->setImage($cp);
		
	}
	
	
	public function ResizeHeight($height){
		
		$ratio = $height / $this->imgHandler->getHeight();
		$width = $this->imgHandler->getWidth() * $ratio;
		$this->Resize($width, $height);		
		
	}
	
	
	public function ResizeWidth($width){
		
		$ratio = $width / $this->imgHandler->getWidth();
		$height = $this->imgHandler->getHeight() * $ratio;
		$this->Resize($width, $height);		
		
	}
	
	

	
	public function Thumbnail($width, $height){
		
		$ratio = $width  / $height;
		
		$orig_w = $this->imgHandler->getWidth();
		$orig_h = $this->imgHandler->getHeight();
		
				

		
		$canvas = imagecreatetruecolor($width, $height);
		imagecopyresampled($canvas, $this->imgHandler->getImage(), 0,0,0,0,$width, $height ,  $orig_w , $orig_h);
		
		//imagecopy($canvas, $this->imgHandler->getImage(), 0,0,$top,$left, $width, $height);
		$this->imgHandler->setImage($canvas); 
		
		
	}
	
	
	public function ScalePercentage($percent){
		
		$width = ($this->imgHandler->getWidth() * $percent) / 100;
		$height = ($this->imgHandler->getHeight() * $percent) / 100;  
		$this->Resize($width, $height);
	}
	
	public function Close(){
		
		imagedestroy($this->imgHandler);
		imagedestroy($this->originalImg);

		
	}
	
	public function Show(){
		
		switch($this->imgHandler->getType()){
			
		case IMAGETYPE_JPEG:
			imagejpeg($this->imgHandler->getImage());
			break;
			
		case IMAGETYPE_GIF:
			imagegif($this->imgHandler->getImage());
			break;
			
		case IMAGETYPE_PNG:
			imagepng($this->imgHandler->getImage());
			break;
			
		default:
			imagejpeg($this->imgHandler->getImage());
			break;
			
		
			
		}
		
		
	}
	
	
	public function Save($path, $quality = 100){
		
		switch($this->imgHandler->getType()){
			
		case IMAGETYPE_JPEG:
			imagejpeg($this->imgHandler->getImage(), $path, $quality);
			break;
			
		case IMAGETYPE_GIF:
			imagegif($this->imgHandler->getImage(), $path, $quality);
			break;
			
		case IMAGETYPE_PNG:
			imagepng($this->imgHandler->getImage(), $path, $quality);
			break;
			
		default:
			imagejpeg($this->imgHandler->getImage(), $path, $quality);
			break;
			
		
			
		}
		
		
	}
	
	
	
	
	
}


?>
<?
/*
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

class Image   {
	
	
	private $image;
	private $info;
	private $imagetype;
	private $imagepath;
	private $image_width;
	private $image_height;  
	
	
	public function __construct($image){
		
		$this->info = getimagesize($image);
		$this->imagetype = $this->info[2];
		
		
		switch($this->imagetype){
			
			case IMAGETYPE_JPEG:
				$this->image = imagecreatefromjpeg($image);
				break;
				
			case IMAGETYPE_GIF:
				$this->image = imagecreatefromgif($image);
				break;
				
			case IMAGETYPE_PNG:
				$this->image = imagecreatefrompng($image);
				break;
			
			
		}
		
		
		$this->image_width = imagesx($this->image);
		$this->image_height = imagesy($this->image);
		
		
	}
	
	public function setImage($newimage){
		
		$this->image = $newimage;	
	}
	
	public function getImage(){
		
		return $this->image;	
	}
	
	public function getWidth(){
		return $this->image_width;	
	}
	
	public function getHeight(){
		return $this->image_height;	
	}
	
	public function getImagePath(){
		
		return $this->imagepath;
	}
	
	public function getType(){
		
		return $this->imagetype;
		
	}
	
	
}

?>
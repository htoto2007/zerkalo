<?
	class Image{
		public $filename;
		public $fileType;
		public $prefix;
		public $dir;
		public $new_width = 0;
		public $new_height = 0;
		private $new_widthDST = 0;
		private $new_heightDST = 0;
		private $new_widthSRC = 0;
		private $new_heightSRC = 0;
		private $paddingX = 0;
		private $paddingY = 0;
		private $DST;
		public $convertType;
		public $square = false;
		
		private function calcDST(){
			list($width, $height) = getimagesize($this->dir.$this->filename);
			
			if(($this->new_width !== 0) && ($this->new_width !== "") && (($this->new_height === 0) || ($this->new_height === ""))){
				$percent = 100 / $width*$this->new_width;
				$this->new_heightDST = $height / 100 * $percent;
				$this->new_widthDST = $this->new_width;
			}elseif(($this->new_height !== 0) && ($this->new_height !== "") && (($this->new_width === 0) || ($this->new_width === ""))){
				$percent=100 / $height*$this->new_height;
				$this->new_widthDST = $width / 100 * $percent;
				$this->new_heightDST = $this->new_height;
			}else{
				$this->new_heightDST = $this->new_height;
				$this->new_widthDST = $this->new_width;
			}
			
			if($this->square === true){
				if($this->new_widthDST > $this->new_heightDST){
					$this->new_heightDST = $this->new_widthDST;
					$this->new_widthDST = $this->new_widthDST;
				}else{
					$this->new_heightDST = $this->new_heightDST;
					$this->new_widthDST = $this->new_heightDST;
				}
			}
			
			$this->DST = imagecreatetruecolor($this->new_widthDST, $this->new_heightDST);
			$color = imagecolorallocate($this->DST, 255, 255, 255);
			imagefill($this->DST,0,0, $color);
			return true;
		}
		
		private function calcSRC(){
			list($width, $height) = getimagesize($this->dir.$this->filename);
			if(($this->new_width !== 0) && ($this->new_width !== "") && (($this->new_height === 0) || ($this->new_height === ""))){
				$percent = 100 / $width*$this->new_width;
				$this->new_heightSRC = $height / 100 * $percent;
				$this->new_widthSRC = $this->new_width;
			}elseif(($this->new_height !== 0) && ($this->new_height !== "") && (($this->new_width === 0) || ($this->new_width === ""))){
				$percent=100 / $height*$this->new_height;
				$this->new_widthSRC = $width / 100 * $percent;
				$this->new_heightSRC = $this->new_height;
			}else{
				$this->new_heightSRC = $this->new_height;
				$this->new_widthSRC = $this->new_width;
			}
			return true;
		}
		
		private function calcPadding(){
			$this->paddingX = ($this->new_widthDST - $this->new_widthSRC) / 2;
			$this->paddingY = ($this->new_heightDST - $this->new_heightSRC) / 2;
			return true;
		}
		
		public function resize(){
			/* 
				Íåîáõîäèìûå ñâîéñòâà
				--------------------
				$Image::dir
				$Image::prefix
				$Image::filename
				$Image::new_width
				$Image::new_height
			*/
			
			$this->calcDST();
			$this->calcSRC();
			$this->calcPadding();
			
			list($width, $height) = getimagesize($this->dir.$this->filename);
			switch($this->fileType){
				case "image/gif":
					$image = imagecreatefromgif($this->dir.$this->filename);
					imagealphablending($this->DST, false);
					imagesavealpha($this->DST, true);
					imagecopyresampled($this->DST,$image,$this->paddingX,$this->paddingY,0,0,$this->new_widthSRC,$this->new_heightSRC,$width,$height);
					imagegif($this->DST,$this->dir.$this->prefix."_".$this->filename,9);
					$this->filename = $this->prefix."_".$this->filename;
					break;
				case "image/png":
					$image = imagecreatefrompng($this->dir.$this->filename);
					imagealphablending($this->DST, false);
					imagesavealpha($this->DST, true);
					imagecopyresampled($this->DST,$image,$this->paddingX,$this->paddingY,0,0,$this->new_widthSRC,$this->new_heightSRC,$width,$height);
					imagepng($this->DST,$this->dir.$this->prefix."_".$this->filename,9);
					$this->filename = $this->prefix."_".$this->filename;
					break;
				case "image/jpeg":
				case "image/pjpeg":
					$image = imagecreatefromjpeg($this->dir.$this->filename);
					imagecopyresampled($this->DST,$image,$this->paddingX,$this->paddingY,0,0,$this->new_widthSRC,$this->new_heightSRC,$width,$height);
					imagejpeg($this->DST,$this->dir.$this->prefix."_".$this->filename, 80);
					$this->filename = $this->prefix."_".$this->filename;
					break;
				default:
					return false;
			}
			imagedestroy($this->DST);
			imagedestroy($image);
			
			$this->new_width = 0;
			$this->new_height = 0;
			$this->new_widthDST = 0;
			$this->new_heightDST = 0;
			$this->new_widthSRC = 0;
			$this->new_heightSRC = 0;
			$this->paddingX = 0;
			$this->paddingY = 0;
			
			return true;
		}
		
		public function convert(){
			/* 
				Íåîáõîäèìûå ñâîéñòâà
				--------------------
				$Image::convertType
				$Image::dir
				$Image::prefix
				$Image::filename
				$Image::fileType
			*/
			
			
			list($width, $height) = getimagesize($this->dir.$this->filename);
			$this->DST = imagecreatetruecolor($width, $height);
			
			$image = "";
			switch($this->fileType){
				case "image/gif":
					$image = imagecreatefromgif($this->dir.$this->filename);
					break;
				case "image/png":
					$image = imagecreatefrompng($this->dir.$this->filename);
					break;
				case "image/jpeg":
				case "image/pjpeg":
					$image = imagecreatefromjpeg($this->dir.$this->filename);
					break;
				default:
					return false;
			}
			
			switch($this->convertType){
				case "image/gif":
					// ðàáîòàåì ñ ïîëó÷åííîé êàðòèíêîé
					imagealphablending($image, false);		// îòêëþ÷àåì ñìåøèâàíèå àëüôà êàíàëà
					imagesavealpha($image, true);			// îòêëþ÷àåì àëüôà êàíàë
					imagegif($this->DST,$this->dir.$this->prefix."_".$this->filename.".gif",9);
					$this->filename = $this->prefix."_".$this->filename.".gif";
					break;
				case "image/png":
					// ðàáîòàåì ñ ïîëó÷åííîé êàðòèíêîé
					imagealphablending($image, false);		// îòêëþ÷àåì ñìåøèâàíèå àëüôà êàíàëà
					imagesavealpha($image, true);			// îòêëþ÷àåì àëüôà êàíàë
					imagepng($this->DST,$this->dir.$this->prefix."_".$this->filename.".png",9);
					$this->filename = $this->prefix."_".$this->filename.".png";
					break;
				case "image/jpeg":
				case "image/pjpeg":
					$color = imagecolorallocate($this->DST, 255, 255, 255);
					imagefilledrectangle($this->DST, 0, 0, $width, $height, $color); // ñîçäàåì áåëûé ïðÿìîóãîëüíèê
					$color = imagecolorclosest($image, 255, 255, 255);	// ïîëó÷àåì öâåò êàðòèíêè
					imagecolortransparent($image, $color); // äåëàåì ïðîçðà÷êó áåëîé
					imagecopy($this->DST, $image, 0,0,0,0, $width, $height); // íàêëàäûâàåì íà áåëûé ïðÿìîóãîëüíèê èçîáðàæåíèå
					imagejpeg($this->DST, $this->dir.$this->prefix."_".$this->filename.".jpg", 80); // ïðåâðàùàåì â jpeg
					$this->filename = $this->prefix."_".$this->filename.".jpg";
					break;
				default:
					return false;
			}
			imagedestroy($this->DST);
			imagedestroy($image);
			return true;
		}
	}
?>
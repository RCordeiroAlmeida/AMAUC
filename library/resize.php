<?php
class resize{

	private $fileName;
	private $newWidth;
	private $newHeight;
	private $path;
	private $resolution;
	
	function setFileName($filename){
		$this->fileName = $filename;
	}
	
	function getFileName(){
		return $this->fileName;
	}
	
	function setNewWidth($newWidth){
		$this->newWidth = $newWidth;
	}
	
	function getNewWidth(){
		return $this->newWidth;
	}
	
	function setNewHeight($newHeight){
		$this->newHeight = $newHeight;
	}
	
	function getNewHeight(){
		return $this->newHeight;
	}

	function setPath($path){
		$this->path = $path;
	}
	
	function getPath(){
		return $this->path;
	}	

	function setResolution($resolution){
		$this->resolution = $resolution;
	}
	
	function getResolution(){
		return $this->resolution;
	}
		
	function resizeImage(){

		#pegando as dimensoes reais da imagem, largura e altura
		list($width, $height) = getimagesize($this->getPath().$this->getFileName());

		#gerando a a miniatura da imagem
		$image_p = imagecreatetruecolor($this->getNewWidth(), $this->getNewHeight());
		$image = imagecreatefromjpeg($this->getPath().$this->getFileName());
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $this->getNewWidth(), $this->getNewHeight(), $width, $height);

		$fileName  = explode('.',$this->getFileName());
		$file = md5(uniqid(time())).'.'.$fileName[1];
		#o 3º argumento é a qualidade da miniatura de 0 a 100
		imagejpeg($image_p, $this->getPath().$file, $this->getResolution());
		imagedestroy($image_p);
		
		
		
		return $file;	
		
	}
	
	function createThumb(){

		#pegando as dimensoes reais da imagem, largura e altura
		list($width, $height) = getimagesize($this->getPath().$this->getFileName());

		#gerando a a miniatura da imagem
		$image_p = imagecreatetruecolor($this->getNewWidth(), $this->getNewHeight());
		$image = imagecreatefromjpeg($this->getPath().$this->getFileName());
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $this->getNewWidth(), $this->getNewHeight(), $width, $height);

		$fileName  = explode('.',$this->getFileName());
		$file = $fileName[0]."_thumb.".$fileName[1];
		#o 3º argumento é a qualidade da miniatura de 0 a 100
		imagejpeg($image_p, $this->getPath().$file, $this->getResolution());
		imagedestroy($image_p);
		
		return $file;	
		
	}	
					
}
?>
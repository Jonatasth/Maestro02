<?php
//herdar a classe Imagem
class toolimage extends Imagem{
	
	//criar um atributo com um modificar de acesso
	public $file;
	
//sobreescrever o método resize
public function resize ($width = 0, $height = 0, $default = ''){
	
	
	if (!is_file(DIR_IMAGE.$this->file)){
		$this->file='imagem/catalog/no_image.jpg';	
	}
	
	$extension = pathinfo($this->file, PATHINFO_EXTENSION);
	$image_old = DIR_IMAGE . $this->file;
	$image_new = utf8_encode(DIR_CACHE . pathinfo($image_old, PATHINFO_FILENAME).'-'.$width.'x'.$height.'.'.$extension);
	
	//parent::resize($width = 0, $height = 0, $default = '');
	
	if (!is_file($image_new)||(filectime($image_old)>filectime($image_new))){
			
		
		list($width_orig, $height_orig, $image_type) = getimagesize($image_old);
		
		if (!in_array( $image_type, array( IMAGETYPE_PNG , IMAGETYPE_JPEG  , IMAGETYPE_GIF ))){
			return $image_old;
		}
		
		$path = '';
		$diretories = explode('/', dirname($image_new));
		foreach ($diretories as $directory){
			$path = $path.'/'.$directory;
			if (!is_dir($path)){
				@mkdir($path);
			}
		}
		
		if ($width_orig != $width || $height != $height_orig){
			parent::setFile($this->file);
			parent::resize($width, $height);
			parent::save($image_new);
		}else {
			copy($image_old, $image_new);
		}
		
		
	}
	
	return str_replace('C:/wamp64/www','',$image_new);
}
//utilizar o método resize da classe herdad






}
?>

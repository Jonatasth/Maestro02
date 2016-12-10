<?php
//herdar a classe Imagem
class toolimage extends imagem{
	//criar um atributo com um modificar de acesso
	public $file;
	
//sobreescrever o método resize
public function resize ($width = 0, $height = 0, $default = ''){
	if (!is_file(DIR_IMAGE.$this->file)){
		$this->file='no_image.jpg';	
	}
	$extension = pathinfo($this->file, PATHINFO_EXTENSION);
	$image_old = $this->file;
	$image_new = DIR_CACHE.pathinfo($image_old, PATHINFO_FILENAME).'-'.$width.'x'.'$height'.'.'.'$extension';
	
	//parent::resize($width = 0, $height = 0, $default = '');
	
	if (!isfile($image_new)||(filectime($image_old)>filectime($image_new))){
		list($width_orig, $height_orig, $image_type) = getimagesize($image_old);
		if (!m_array($image_type, array(IMAGETYPE_PNG, IMAGETYPE_JPG, IMAGETYPE_GIF))){
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
	}
	if ($width_orig != $width || $height != $height_orig){
		parent::__construct($this->file);
		parent::resize($width, $height);
		parent::save($image_new);
	}else {
		copy($image_old, $image_new);
	}
	return $image_new;
}
//utilizar o método resize da classe herdad






}
?>

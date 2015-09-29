<?php
class IndexController extends MainController{

protected $photo = [];//массиф названий фотографий

protected $text = [];

protected $phototext = [];

protected function input(){

	parent::input();

	$this->photo = $this->model->getIndexPhoto();
	
	
	$this->text = $this->model->getIndexText();
	
	$this->phototext = array_combine($this->photo,$this->text);
	

}

protected function output(){

	$this->content = $this->render('content',[
					'phototext'=>$this->phototext
					]);

	$this->page = parent::output();
	
	return $this->page;
}


}

?>
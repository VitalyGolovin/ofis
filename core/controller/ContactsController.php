<?php
class ContactsController extends MainController{

protected function input(){

}

protected function output(){

	$this->content = $this->render('contacts');
	
	$this->page = parent::output();
	
	return $this->page;
	

}

}

?>
<?php

class MainController extends BaseController{

protected $header;

protected $content;

protected $footer;

protected $model;

protected function input(){

	$this->model = Model::getInstance();
	
	
	

}

protected function output(){

	$this->header = $this->render('header');
	
	$this->footer = $this->render('footer');
	
	$page = $this->render('index',[
                                    'header'=>$this->header,
                                    'content'=>$this->content,
                                    'footer'=>$this->footer
				]);
	
	return $page;

}

}

?>
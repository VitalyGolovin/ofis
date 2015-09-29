<?php
abstract class BaseController{

protected $requestUrl;//запрос пользователя

protected $controller;//контроллер

protected $params;//массив параметров

protected $page;

public function route(){

	if(class_exists($this->controller)){
	
		$reflection = new ReflectionClass($this->controller);
		//var_dump($reflection);die();
			if($reflection->hasMethod('request')){
			
				if($reflection->isInstantiable()){
					//создаем экземпляр класса контролера
					$newControllerClass = $reflection->newInstance();
					//Возвращаем экземпляр ReflectionMethod для метода класса
					$method = $reflection->getMethod('request');
					//Вызываем метод request() у экземпляра класса контроллера
					$method->invoke($newControllerClass,$this->params);
				
				}
			}	
	}else{
			
		die('Неверный адрес');
	}
}	
	
public function request(){
	
	//подготавливает данные из базы данных
	$this->input();
	//формирует вывод
	$this->output();
	//выводит на экран
	$this->echoPage();
	
	}
	
protected function input(){}

protected function output(){}

protected function echoPage(){

	echo $this->page;
}

protected function render($view,$param = []){
	
	extract($param);
	
	ob_start();
	
	include_once(VIEW.$view.'.php');
	
	return ob_get_clean();

}
	
	
}



?>
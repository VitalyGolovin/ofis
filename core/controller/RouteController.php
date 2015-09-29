<?php

class RouteController extends BaseController{

	static $_instance;
	
	 static function getInstance(){
		if (self::$_instance instanceof self){
			return self::$_instance;
		}
		return self::$_instance = new self();
	}
	
	private function __construct(){
	
		$request = $_SERVER['REQUEST_URI'];//запрос пользователя
		//var_dump($request);die();
		//var_dump($_SERVER['PHP_SELF']);die();
		$path = substr($_SERVER['PHP_SELF'],0,strpos($_SERVER['PHP_SELF'],'index.php'));
		//var_dump($path);die();
		
		if($path === SITE_URL){
			$this->requestUrl = substr($request,strlen(SITE_URL));
			//var_dump($this->requestUrl);die();
			$expUrl = explode('/',rtrim($this->requestUrl,'/'));
			//var_dump($expUrl);die();
			if(!empty($expUrl[0])){
				$this->controller = ucfirst($expUrl[0]).'Controller';
				
			}else{
				$this->controller = 'IndexController';
			}
			//var_dump($this->controller);die();
			
			if(!empty($expUrl[1])){
			
				$key = [];
				$val = [];
				$count = count($expUrl);
			
				for($i=1; $i < $count; $i++){
				
					if($i%2 != 0){
						$key[] = $expUrl[$i];
					}
					else{
						$val[] = $expUrl[$i];
					}
				}
				
				if(!$this->param = array_combine($key,$val)){
					die('Неправильные параметры');
				}
				//var_dump($this->param);
			}
		}
		else{
			die('Неверный адрес сайта');
		}
	}

}

?>
<?php

class Model{

	static $_instance;
	
	public $insDB;
	
	static function getInstance(){
	
		if(self::$_instance instanceof self){
		
			return self::$_instance;
		}
		
		return self::$_instance = new self;
		
	}
	
	private function __construct(){
		
		try {
			$this->insDB = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASS);
			$sql = "SET NAMES UTF8";
			$this->insDB->exec($sql);
			
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	//возвращает массив названий фотографий из таблицы posts
	public function getIndexPhoto(){
	
		$sql= "SELECT img FROM posts";
		$res = $this->insDB->query($sql, PDO::FETCH_ASSOC);
	
		$photo = [];
		
		foreach ($res as $row) {
		
			$photo[] = $row['img'];
		}
		
		return $photo;
		
	}
	public function getIndexText(){
	
		$sql = "SELECT text FROM posts";
		
		$res = $this->insDB->query($sql,PDO::FETCH_ASSOC);
		
		$text = [];
		
		foreach($res as $row){
			$text[] = $row['text'];
		}
		
		return $text;
	
	}
}

?>
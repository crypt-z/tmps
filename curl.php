<?php	
	//Отправляет GET и POST запросы посредствам curl.
	class SendRequest
	{
		private
			//Адрес на который будет отправлен запрос
			$url,
			//Иницилизируем curl сюда
			$curl,
			//Сообщение в случае вызова не существующего метода
			$messageError = "<p style=\"color: red; background: #cccccc; border: solid 1px black; padding: 10px;\">
								 Ошибка: не верный тип запроса метод (<b> %s </b>) не найден</p>",
			//Зоголовок который будет передаватся поумолчанию
			$headers = [
			//'Connection: keep-alive',
			//'Cache-Control: max-age=0',
			//'Upgrade-Insecure-Requests: 1',
			//'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0',
			//'Accept: */*',
			//'Referer: ex.dev',
		],
			//в свойстве храним результат отправленного curl запроса
			$execResult,
			//В свойстве храним опции для отправки curl
			$options;
				
		//Иницилизируем curl
		public function __construct($url, $RETURNTRANSFER = true)
		{
			$this->url = $url;
			$this->curl = curl_init($url);
			if($RETURNTRANSFER){
				$this->options[CURLOPT_RETURNTRANSFER] = true;
			}
			return $this;
		}
		//Задаем заголовок если не задает пользователь то оставляем по умолчанию
		public function headers(array $params = []){
			if(count($params) <= 0){
				$params = $this->headers;
			}
			$this->options[CURLOPT_HTTPHEADER] = $params;
			return $this;
		}
		//метод для отправки post
		private function post($data)
		{
			$this->options[CURLOPT_POST] = true;
			$this->options[CURLOPT_POSTFIELDS] = $data;
		}
		//Метод для отправки get
		private function get($data)
		{
			$this->options[CURLOPT_URL] = $this->url.'?'.$data;
		}
		//Приводим данные в понятный вид для передачи запроса
		private function data($data)
		{
			$result = array();
			if(isset($data[0]) && is_array($data[0]) && empty($data[1])){
				$result = $data[0];
			}else{
				$result = $data;
			}
			return http_build_query($result);
		}
		//Тут выбираем метод для отправки запроса
		public function __call($name, array $arguments)
		{
			$data = $this->data($arguments);
			if($name == 'post' || $name == 'get'){
				$this->$name($data);
				$this->options($this->options);
				$response = $this->exec()->close()->getResult();
			}else{
				$response = sprintf($this->messageError, $name);
			}
			return $response;
		}
		
		
		//Если хотим вручную задать настройки и отправить CURL
		
		//Можно задать массив опций: http://php.net/manual/ru/function.curl-setopt-array.php
		public function options(array $options){
			curl_setopt_array($this->curl, $options);
			return $this;
		}
		//Отправляем запрос
		public function exec(){
			$this->execResult = curl_exec($this->curl);
			return $this;
		}
		//Закрываем соединения
		public function close(){
			curl_close($this->curl);
			return $this;
		}
		//Получаем результат
		public function getResult(){
			return $this->execResult;
		}
		
	}

	$host = $_SERVER['SERVER_NAME'].'/php/' ;
	$url = $_SERVER['SERVER_NAME'].'/php/test.php' ;
	$headers = [
		'Connection: keep-alive' ,
		'Cache-Control: max-age=0' ,
		'Upgrade-Insecure-Requests: 1' ,
		'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0' ,
		'Accept: */*' ,
		"Referer: $host" ,
	           ];
	     echo 'testUrl : '.$url.'<br>' ;		   			 
			   ?>

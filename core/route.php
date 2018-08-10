<?php

class Route
{
	public static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		
		//убираем из url get параметры
		$url = explode('?', $_SERVER['REQUEST_URI'], 2);
		//разбиваем url
		$routes = explode('/', $url[0]);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		// добавляем префиксы
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "controllers/".$controller_file;
		
		if(file_exists($controller_path))
		{
			include "controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			try {
				$controller->$action();
			} catch (Exception $e) {
				exit($e->getMessage());
			}
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}
	
	}
	
	private static function ErrorPage404()
	{
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location: /main/404');
    }
}
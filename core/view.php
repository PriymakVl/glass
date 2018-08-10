<?php

class View {
	
	public $header = 'header.php';
	public $footer = 'footer.php';

	public function render($content, $data = null)
	{
		$content = $content.'.php';
        $title = 'Главная страница';
        $url = SITE_URL;
		if ($data) extract($data);
		include_once('./views/layouts/base.php');
		exit();
	}
}
<?php
require_once('./core/controller.php');
require_once('./models/sheet.php');
require_once ('./helpers/param.php');
require_once ('./helpers/excel.php');
require_once('./libraries/phpexcel/Classes/PHPExcel.php');

class Controller_Sheet extends Controller {

	public function action_index()
	{
		$sheet = Sheet::getOne();
		$this->view->render('sheet/index', compact('sheet'));
	}
	
	public function action_list()
	{
	    $params = Param::forSheetList();
		$sheets = Sheet::getSheets($params);
		$this->view->render('sheet/list', compact('sheets', 'params'));
	}

    public function action_add_sheets()
    {
        $excel = new Excel();
        //$objPHPExcel = new \PHPExcel();
        //$objPHPExcel = PHPExcel_IOFactory::load($path);
        //debug($objPHPExcel);
        $fileType = \PHPExcel_IOFactory::identify($path);  // узнаем тип файла, excel может хранить файлы в разных форматах, xls, xlsx и другие
        $reader = \PHPExcel_IOFactory::createReader($fileType); // создаем объект для чтения файла
        $excel = $reader->load($path); // загружаем данные файла в объект
        $array = $excel->getActiveSheet()->toArray(); // выгружаем данные из объекта в массив
        debug($array);
        $this->save($array);
        exit('end');
    }
	
}
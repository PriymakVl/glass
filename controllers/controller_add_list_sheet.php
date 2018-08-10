<?php

require_once('/core/controller.php');
require_once('/libraries/phpexcel/Classes/PHPExcel.php');


class Controller_AddSheets extends Controller {

    public function actionIndex()
    {
        $path = '/web/files/sheets.xls';
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


















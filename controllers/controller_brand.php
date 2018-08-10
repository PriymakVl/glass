<?php
require_once('/core/controller.php');
require_once('/models/brand.php');
require_once ('/helpers/param.php');


class Controller_Brand extends Controller {

	public function action_index()
	{
		$brand = Brand::getOne();
		$brand->getManufacturer();
		$this->view->render('brand/index', compact('brand'));
	}
	
	public function action_list()
	{
	    $params = Param::forBrandList();
		$brands = Brand::getList($params);
		$this->view->render('brand/list', compact('brands', 'params'));
	}
	
}
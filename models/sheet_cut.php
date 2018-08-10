<?php
require_once('sheet.php');

class SheetCut extends Model {
	
	public $cuts;
	
	public function selectOne($width, $height)
	{
		$this->selectByWidth($width);
		$this->selectByHeight($height);
		if (count($this->selected) > 1) $this->selectByArea();
		else $this->sheet = $this->selected[0];
	}
	
	private function selectByWidth($width)
	{
		foreach ($this->selected as $sheet) {
			if ($sheet->width > $width) $this->selected[] = $sheet;
		}
		if (empty($this->selected)) throw new Exception($this->messages['exception']['residue_not_exist']);
	}
	
	private function selectByHeight($height)
	{
		foreach ($this->selected as $sheet) {
			if ($sheet->height > $height) $sheets[] = $sheet;
		}
		if (empty($sheets)) throw new Exception($this->messages['exception']['residue_not_exist']);
		else $this->selected = $sheets;
	}
	
	private function selectByArea()
	{
		$this->sheet = $this->selected[0];
		foreach ($this->selected as $item) {
			if ($this->sheet->area > $item->area) $this->sheet = $item;
		}
	}
	
	
}
























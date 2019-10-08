<?php
namespace App\Controllers;

use App;
use Carbon\Carbon;

class ConsoleController
{
	public static function run($filename)
	{
		$handler = App\Handlers\CsvHandler::_($filename);
		$handler->init();
		$handler->addHeader();

		$now = Carbon::now();
		$loopDate = $now->copy();

		do {
			$row = App\MonthModel::_($loopDate)->getRow();
			if($row) {
				$handler->addRow($row);
			}
			$loopDate->addMonth();
		} while ($now->format('Y') == $loopDate->format('Y'));
	}
}


?>
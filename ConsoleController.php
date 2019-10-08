<?php
namespace App\Controllers;

use App;
use Carbon\Carbon;

class ConsoleController
{
	public static function run()
	{
		global $argv;
		$filename = isset($argv[1]) ? $argv[1] : false;
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

		echo "DONE\n";
		exit(0);
	}
}


?>
<?php
namespace App;

use \Carbon\Carbon;
use App;


class MonthModel
{
	public $currentDate;
	public static function _($currentDate)
	{
		$obj = new self();
		$obj->currentDate = $currentDate;
		return $obj;
	}

	public function getRow()
	{
		$firstDay = $this->currentDate->copy();
		$row = [$this->currentDate->format(App\MONTH_FORMAT), '', ''];

		$lastDay = $firstDay->copy()->endOfMonth();
		switch ($lastDay->format('D')) {
			case 'Sun':
				$row[1] = $lastDay->subDays(2)->format(App\SALARY_DATE_FORMAT);
				break;

			case 'Sat':
				$row[1] = $lastDay->subDays(1)->format(App\SALARY_DATE_FORMAT);
				break;

			default:
				$row[1] = $lastDay->format(App\SALARY_DATE_FORMAT);
				break;
		}

		$bonusDay = $firstDay->copy()->addMonth();
		$bonusDay->day = 15;

		switch ($bonusDay->copy()->format('D')) {
			case 'Sun':
				$row[2] = $bonusDay->addDays(3)->format(App\BONUS_DATE_FORMAT);
				break;

			case 'Sat':
				$row[2] = $bonusDay->addDays(4)->format(App\BONUS_DATE_FORMAT);
				break;

			default:
				$row[2] = $bonusDay->format(App\BONUS_DATE_FORMAT);
				break;
		}
		return $row;
	}
}

?>
<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App;
use Carbon\Carbon;

include('./ConsoleController.php');
include('./CsvHandler.php');
include('./MonthModel.php');
include('./Config.php');

// ./vendor/bin/phpunit --bootstrap ./vendor/autoload.php ./tests/CsvTest

final class CsvTest extends TestCase
{
	public function testCheckOutputGeneratedOnDifferentDates(): void
	{
		$date = '2019-10-17';
		$filename = "./test-output/data-".$date.".csv";
		Carbon::setTestNow(Carbon::parse($date.' 04:30:00'));
		\App\Controllers\ConsoleController::run($filename);
		fwrite(STDERR, "\nIf executed on date {$date}:\n\n");
		$contents = file_get_contents($filename);
		fwrite(STDERR, $contents);
		$this->assertNotEquals(
			false,
			strpos($contents, '29/11/2019')
		);

		
		fwrite(STDERR, "\n\n");

		$date = '2019-06-21';
		Carbon::setTestNow(Carbon::parse($date . ' 04:30:00'));
		$filename = "./test-output/data-".$date.".csv";
		\App\Controllers\ConsoleController::run($filename);
		fwrite(STDERR, "\nIf executed on date {$date}:\n\n");
		$contents = file_get_contents($filename);
		fwrite(STDERR, $contents);
		fwrite(STDERR, "\n\n");

		$this->assertNotEquals(
			false,
			strpos($contents, '30/08/2019')
		);
	}

	/* public function testCannotBeCreatedFromInvalidEmailAddress(): void
	{
		$this->expectException(InvalidArgumentException::class);

		Email::fromString('invalid');
	}

	public function testCanBeUsedAsString(): void
	{
		$this->assertEquals(
			'user@example.com',
			Email::fromString('user@example.com')
		);
	} */
}

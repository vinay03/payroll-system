<?php
namespace App\Handlers;

use App;
use League\Csv\Writer;
use Carbon\Carbon;

class CsvHandler
{
    public $filename = '';
    public $csv;
    public function __construct($filename)
    {
        $this->filename = $filename;
    }
    public static function _($filename)
    {
        $obj = new self($filename);
        return $obj;
    }
    public function init()
    {
        // Check if filename is given or not.
        if (!$this->filename || empty($this->filename)) {
            echo "ERROR: File name not specified.\n";
            exit(1);
        }

        // Check if it is writeable or not.
        $result = @file_put_contents($this->filename, '');
        if ($result === false) {
            echo "ERROR: Failed to create output file.\n";
            exit(2);
        }
        $this->csv = Writer::createFromPath($this->filename, 'w');
    }
    public function addHeader()
    {
        $this->csv->insertOne(['Month', 'Salary Payment Date', 'Bonus Payment Date']);
    }
    public function addRow($row)
    {
        $this->csv->insertOne($row);
    }
}


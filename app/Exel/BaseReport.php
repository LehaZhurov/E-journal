<?php

namespace App\Exel;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

abstract class BaseReport
{

    const REALPATH = "./../storage/app/public/exelreport/reports/";
    const DOWNLOADPATH = "/exelreport\/reports\/";
    const EXAMPLEFILE = './../storage/app/public/exelreport/ex/ex.xlsx';

    public function __construct()
    {
        $this->spreadsheet = IOFactory::load($this::EXAMPLEFILE);
    }

    public function spreadsheet(): Spreadsheet
    {
        $this->spreadsheet = new Spreadsheet();
        return $this->spreadsheet;
    }

    public function save(Spreadsheet $spreadsheet, string $nameFile)
    {
        $writer = new Xlsx($spreadsheet);
        $writer->save($this::REALPATH . $nameFile . ".xlsx");
        return $this::DOWNLOADPATH;
    }

}

<?php

namespace App\Exel;

class GroupForMonthReport extends BaseReport
{

    public function test(){
        $this->spreadsheet->getActiveSheet()->setCellValue('A1', 'PhpSpreadsheet');
        $this->save($this->spreadsheet,'newfiel');
    }


    public static function new () {
        return new self();
    }
}

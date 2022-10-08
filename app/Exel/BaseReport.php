<?php

namespace App\Exel;

use Shuchkin\SimpleXLSXGen;

abstract class BaseReport
{

    const REALPATH = "../../storage/app/public/exelrepot/";
    const DOWNLOADPATH = '/exelreport\/';
    public function generate(array $data): BaseReport
    {
        $this->XLS = SimpleXLSXGen::fromArray($data);
        return $this;
    }

    public function save(string $nameFile)
    {
        $filePath = $this->REALPATH . $nameFile . "xlsx";
        $result = $this->saveAs($filePath);
        if ($result != true) {
            return false;
        }
        return $this->DOWNLOADPATH . $nameFile;
    }

}

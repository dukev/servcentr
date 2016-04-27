<?php

require_once 'PHPExcel/IOFactory.php';

  $objPHPExcel = PHPExcel_IOFactory::load(
    "C:xampp\htdocs\servcentr\TMC_01.08.15.xls");
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
    $worksheetTitle     = $worksheet->getTitle();
    $highestRow         = $worksheet->getHighestRow(); // например, 10
    $highestColumn      = $worksheet->getHighestColumn(); // например, 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $nrColumns = ord($highestColumn) - 64;
    echo "<br>В таблице ".$worksheetTitle." ";
    echo $nrColumns . ' колонок (A-' . $highestColumn . ') ';
    echo ' и ' . $highestRow . ' строк.';
    echo '<br>Данные: <table border="1"><tr>';
    for ($row = 1; $row <= $highestRow; ++ $row)
    {
        echo '<tr>';
        for ($col = 0; $col < $highestColumnIndex; ++ $col) 
        {
            $cell = $worksheet->getCellByColumnAndRow($col, $row);
            $val = $cell->getValue();
            $dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
            echo '<td>' . $val . '<br>(Тип ' . $dataType . ')</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
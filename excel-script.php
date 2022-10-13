<?php
include  "config.php";
include_once  "Common.php";
echo ini_get('post_max_size');

if($_FILES['excelDoc']['name']) {
    $arrFileName = explode('.', $_FILES['excelDoc']['name']);

    echo $arrFileName[1];
    if ($arrFileName[1] == 'csv') {
        $handle = fopen($_FILES['excelDoc']['tmp_name'], "r");
        $count = 0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $count++;
            if ($count == 1) {
                continue; // skip the heading header of sheet
            }
                $invoiceNo = $connection->real_escape_string($data[0]);
                $stockCode = $connection->real_escape_string($data[1]);
                $description = $connection->real_escape_string($data[2]);
                $quantity = $connection->real_escape_string($data[3]);
                $invoiceDate = $connection->real_escape_string($data[4]);
                $unitPrice = $connection->real_escape_string($data[5]);
                $customerId = $connection->real_escape_string($data[6]);
                $country = $connection->real_escape_string($data[7]);
                $common = new Common();
                $SheetUpload = $common->uploadData($connection,$invoiceNo,$stockCode,$description,$quantity,$invoiceDate,$unitPrice,$customerId,$country);
        }
        if ($SheetUpload){
            echo "<script>alert('Excel file has been uploaded successfully !');window.location.href='index.php';</script>";
        }
    }
}

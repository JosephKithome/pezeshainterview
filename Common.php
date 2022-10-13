<?php


class Common
{
  public function uploadData($connection, $invoiceNo, $stockCode, $description, $quantity, $invoiceDate, $unitPrice, $customerId, $country)
  {

    // echo $connection;
    $mainQuery = "INSERT INTO  inventory SET invoiceNo='$invoiceNo',
      stockCode='$stockCode',description='$description',quantity='$quantity',
      invoiceDate='$invoiceDate',unitPrice='$unitPrice',customerId='$customerId',country='$country'";
    $connection->query($mainQuery) or die("Error in main Query" . $connection->error);

    $id = $connection->insert_id;

    $query = "SELECT * FROM inventory WHERE id = '$id'";

    $res = $connection->query($query);

    $result1 = $res->fetch_assoc();

    return $result1;
  }
}

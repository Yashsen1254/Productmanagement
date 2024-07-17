<?php

require('../../includes/init.php');
header("Content-type:application/json");

$Id = $_POST['ServiceId'];
$ProductId = $_POST["ProductId"];
$BuyerName = $_POST["BuyerName"];
$BuyerNumber = $_POST["BuyerNumber"];
$BuyerAddress = $_POST["BuyerAddress"];
$BuyerCity = $_POST["BuyerCity"];
$BuyerState = $_POST["BuyerState"];
$ToDate = $_POST["ToDate"];
$FromDate = $_POST["FromDate"];
$Price = $_POST["Price"];

$query = "UPDATE services SET ProductId=?, BuyerName=?, BuyerNumber=?, BuyerAddress=?, BuyerCity=?, BuyerState=?, ToDate=?, FromDate=?, Price=? WHERE ServiceId=?";
$param = [$ProductId, $BuyerName, $BuyerNumber, $BuyerAddress, $BuyerCity, $BuyerState, $ToDate, $FromDate, $Price, $Id];

$result = execute($query,$param);
if ($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);

?>
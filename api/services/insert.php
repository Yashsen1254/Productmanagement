<?php

header("Content-Type: application/json");
require ('../../includes/init.php');

$ProductId = $_POST["ProductId"];
$BuyerName = $_POST["BuyerName"];
$BuyerNumber = $_POST["BuyerNumber"];
$BuyerAddress = $_POST["BuyerAddress"];
$BuyerCity = $_POST["BuyerCity"];
$BuyerState = $_POST["BuyerState"];
$ToDate = $_POST["ToDate"];
$FromDate = $_POST["FromDate"];
$Price = $_POST["Price"];

$query = "INSERT INTO services (ProductId,BuyerName,BuyerNumber,BuyerAddress,BuyerCity,BuyerState,ToDate,FromDate,Price) VALUES (?,?,?,?,?,?,?,?,?)";
$param = [$ProductId, $BuyerName, $BuyerNumber, $BuyerAddress, $BuyerCity, $BuyerState, $ToDate, $FromDate, $Price];

execute($query, $param);

echo json_encode(["status" => "success", "message" => "Services Added"]);
?>
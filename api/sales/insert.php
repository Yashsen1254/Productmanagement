<?php

header("Content-Type: application/json");
require '../../includes/init.php';

$ProductId = $_POST["ProductId"];
$ItemPrice = $_POST["ItemPrice"];
$BuyerName = $_POST["BuyerName"];
$BuyerNumber = $_POST["BuyerNumber"];
$BuyerAddress = $_POST["BuyerAddress"];
$BuyerCity = $_POST["BuyerCity"];
$BuyerState = $_POST["BuyerState"];
$DateOfSales = $_POST["DateOfSales"];
$TotalPrice = $_POST["TotalPrice"];

$query = "INSERT INTO Sales (ProductId,ItemPrice,BuyerName,BuyerNumber,BuyerAddress,BuyerCity,BuyerState,DateOfSales,TotalPrice) VALUES (?,?,?,?,?,?,?,?,?)";
$param = [$ProductId,$ItemPrice,$BuyerName,$BuyerNumber,$BuyerAddress,$BuyerCity,$BuyerState,$DateOfSales,$TotalPrice];

execute($query, $param);

echo json_encode(["status" => "success", "message" => "Sales Added"]);
?>
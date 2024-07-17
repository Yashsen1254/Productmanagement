<?php

require('../../includes/init.php');
header("Content-type:application/json");

$Id = $_POST['SalesId'];
$ProductId = $_POST["ProductId"];
$ItemPrice = $_POST["ItemPrice"];
$BuyerName = $_POST["BuyerName"];
$BuyerNumber = $_POST["BuyerNumber"];
$BuyerAddress = $_POST["BuyerAddress"];
$BuyerCity = $_POST["BuyerCity"];
$BuyerState = $_POST["BuyerState"];
$DateOfSales = $_POST["DateOfSales"];
$TotalPrice = $_POST["TotalPrice"];

$query = "UPDATE sales SET ProductId=?, ItemPrice = ?, BuyerName=?, BuyerNumber=?, BuyerAddress=?,BuyerCity=?,BuyerState=? DateOfSales=?, TotalPrice=? WHERE SalesId=?";
$param = [$ProductId,$ItemPrice,$BuyerName,$BuyerNumber,$BuyerAddress,$BuyerCity,$BuyerState,$DateOfSales,$TotalPrice,$Id];

$result = execute($query,$param);
if ($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);

?>
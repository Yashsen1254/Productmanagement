<?php

header("Content-Type: application/json");
require '../../includes/init.php';

$ProductId = $_POST["ProductId"];
$ItemPrice = $_POST["ItemPrice"];
$SellerName = $_POST["SellerName"];
$SellerNumber = $_POST["SellerNumber"];
$SellerAddress = $_POST["SellerAddress"];
$SellerCity = $_POST["SellerCity"];
$SellerState = $_POST["SellerState"];
$DateOfPurchase = $_POST["DateOfPurchase"];
$TotalPrice = $_POST["TotalPrice"];

$query = "INSERT INTO purchases (ProductId,ItemPrice,SellerName,SellerNumber,SellerAddress,SellerCity,SellerState,DateOfPurchase,TotalPrice) VALUES (?,?,?,?,?,?,?,?,?)";
$param = [$ProductId,$ItemPrice,$SellerName,$SellerNumber,$SellerAddress,$SellerCity,$SellerState,$DateOfPurchase,$TotalPrice];

execute($query, $param);

echo json_encode(["status" => "success", "message" => "Purchases Added"]);
?>
<?php

require '../../includes/init.php';
header("Content-type:application/json");

$PurchaseId = $_POST['PurchaseId'];
$ProductId = $_POST["ProductId"];
$ItemPrice = $_POST["ItemPrice"];
$SellerName = $_POST["SellerName"];
$SellerNumber = $_POST["SellerNumber"];
$SellerAddress = $_POST["SellerAddress"];
$SellerCity = $_POST["SellerCity"];
$SellerState = $_POST["SellerState"];
$DateOfPurchase = $_POST["DateOfPurchase"];
$TotalPrice = $_POST["TotalPrice"];

$query = "UPDATE purchases SET ProductId = ?, ItemPrice = ?, SellerName = ?, SellerNumber = ?, SellerAddress = ?, SellerCity = ?, SellerState = ?, DateOfPurchase = ?, TotalPrice = ? WHERE PurchaseId = ?";
$params = [$ProductId,$ItemPrice,$SellerName,$SellerNumber,$SellerAddress,$SellerCity,$SellerState,$DateOfPurchase,$TotalPrice,$PurchaseId];

$result = execute($query, $params);
if ($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);

?>
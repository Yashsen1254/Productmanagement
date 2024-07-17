<?php

header("Content-Type: application/json");
require ('../../includes/init.php');

$Name = $_POST["Name"];
$Price = $_POST["Price"];

$query = "INSERT INTO products (Name,Price) VALUES (?,?)";
$param = [$Name,$Price];

execute($query, $param);
echo json_encode(["status" => "success", "message" => "Roles Added"]);

?>
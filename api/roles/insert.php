<?php

header("Content-Type: application/json");
require ('../../includes/init.php');

$Name = $_POST["RoleName"];

$query = "INSERT INTO roles (RoleName) VALUES (?)";
$param = [$Name];

execute($query, $param);
echo json_encode(["status" => "success", "message" => "Roles Added"]);

?>
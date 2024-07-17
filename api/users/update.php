<?php

require('../../includes/init.php');
header("Content-type:application/json");

$Id = $_POST['UserId'];
$Name = $_POST["Name"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];
$RoleId = $_POST["RoleId"];

$query = "UPDATE users SET Name=?, Email=?, Password=?, RoleId=? WHERE UserId=?";
$param = [$Name,$Email,$Password,$RoleId,$Id];

$result = execute($query,$param);
if ($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);

?>
<?php

require '../../includes/init.php';
header("Content-type:application/json");

$Id = $_POST['RoleId'];

$query = "DELETE FROM Roles WHERE RoleId = ?";
$params = [$Id];

$result = execute($query, $params);

if ($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);

?>
<?php

require '../../includes/init.php';
header("Content-type:application/json");

$Id = $_POST['ProductId'];

$query = "DELETE FROM Products WHERE ProductId = ?";
$params = [$Id];

$result = execute($query, $params);
if ($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);

?>
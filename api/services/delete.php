<?php

require '../../includes/init.php';
header("Content-type:application/json");

$Id = $_POST['ServiceId'];

$query = "DELETE FROM services WHERE ServiceId = ?";
$params = [$Id];

$result = execute($query, $params);
if ($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);

?>
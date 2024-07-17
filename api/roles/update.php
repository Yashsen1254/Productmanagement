<?php

require('../../includes/init.php');
header("Content-type:application/json");

$Id = $_POST['RoleId'];
$Name = $_POST['RoleName'];

$query = "UPDATE roles SET RoleName=? WHERE RoleId=?";
$param = [$Name,$Id];

$result = execute($query,$param);
if ($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);

?>
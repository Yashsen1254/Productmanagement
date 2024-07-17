<?php

require('../../includes/init.php');
header("Content-type:application/json");

$Id = $_POST['ProductId'];
$Name = $_POST['Name'];
$Price = $_POST['Price'];

$query = "UPDATE products SET Name=?, Price=? WHERE ProductId=?";
$param = [$Name,$Price,$Id];

$result = execute($query,$param);
if ($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);

?>
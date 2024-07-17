<?php

header("Content-Type: application/json");
require ('../../includes/init.php');

$Name = $_POST["Name"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];
$RoleId = $_POST["RoleId"];

$query = "INSERT INTO users (Name,Email,Password,RoleId) VALUES (?,?,?,?)";
$param = [$Name, $Email, $Password, $RoleId];

execute($query, $param);

$userId = lastInsertId();
$permissionQuery = "INSERT INTO Permissions (UserId,ModuleId,AddPermission,EditPermission,DeletePermission,ViewPermission) VALUES(?,?,?,?,?,?)";

$rolesPermissionParams = [$userId, 1, 0, 0, 0, 0];
$salesPermissionParams = [$userId, 2, 0, 0, 0, 0];
$servicesPermissionParams = [$userId, 3, 0, 0, 0, 0];
$usersPermissionParams = [$userId, 4, 0, 0, 0, 0];
$purchasePermissionParams = [$userId, 5, 0, 0, 0, 0];

execute($permissionQuery, $rolesPermissionParams);
execute($permissionQuery, $usersPermissionParams);
execute($permissionQuery, $purchasePermissionParams);
execute($permissionQuery, $salesPermissionParams);
execute($permissionQuery, $servicesPermissionParams);

if ($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);

?>
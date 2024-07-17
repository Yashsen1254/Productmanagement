<?php

$url = urlOf('pages/login.php');
if (!isset($_SESSION['LoggedIn'])) {
    header("Location: $url");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Premium Tailwind CSS Admin & Dashboard Template" />
    <meta name="author" content="Webonzer" />
    <title>DashHub - Tailwind CSS Admin & Dashboard Template</title>
    <link rel="shortcut icon" href="<?= urlOf('assets/images/favicon.ico') ?>">
    <link rel="stylesheet" href="<?= urlOf('assets/css/style.css') ?>">
</head>
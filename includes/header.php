<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 13/06/2017
 * Time: 21:22
 */

//get connection to the database
$server = "localhost";
$username = "root";
$password = "";
$database = "dandd-db";

//connection attempt.
$conn = mysqli_connect($server, $username, $password, $database);

//if connection failed
if(!$conn) {
    die("Database Connection Failed: ".mysqli_connect_error());
}

?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="container">
    <div class="jumbotron">
        <div class="container">
            <h1 align="center">Dungeons &amp; Dragons</h1>
        </div>
    </div>
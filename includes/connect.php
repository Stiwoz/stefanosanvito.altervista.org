<?php
/**
 * Created by PhpStorm.
 * User: Stiwoz
 * Date: 20/02/2016
 * Time: 10:21
 */

$server_name = "localhost";
$username = "stefanosanvito";
$password = "";
$db_name = "my_stefanosanvito";
$db_table ="comments";

$mysqli = new mysqli($server_name,$username,$password,$db_name);

if (mysqli_connect_errno()) {
    die("Cannot connect to database: " . mysqli_connect_error());
}
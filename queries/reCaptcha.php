<?php
/**
 * Created by PhpStorm.
 * User: stiwo
 * Date: 03-Jun-16
 * Time: 18:06
 */

$captcha="";
if(isset($_POST['g-recaptcha-response'])){
    $captcha = $_POST['g-recaptcha-response'];
}
if(!$captcha){
    die('Please check the the captcha form.');
}
$secretKey = "6LejbCATAAAAAOT3Oi5Ibi__29aKrEeEC--Bqfx5";
$ip = $_SERVER['REMOTE_ADDR'];
$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
$responseKeys = json_decode($response,true);
if(intval($responseKeys["success"]) !== 1) {
    echo 'Captcha test not successful, reload and retry.';
} else {
    echo 'Hello, Human.';
}

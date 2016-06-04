<?php
/**
 * Created by PhpStorm.
 * User: stiwo
 * Date: 03-Jun-16
 * Time: 18:06
 */

require_once "../includes/recaptchalib.php";

$secret = "6LejbCATAAAAAOT3Oi5Ibi__29aKrEeEC--Bqfx5";
$resp = null;
$error = null;
$reCaptcha = new ReCaptcha($secret);
// Was there a reCAPTCHA response?
if ($_REQUEST["g-recaptcha-response"]) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_REQUEST["g-recaptcha-response"]
    );
    if ($resp !== null && $resp->success) {
        echo 1;
        exit;
    } else {
        exit;
    }
}
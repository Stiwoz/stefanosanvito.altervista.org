<?php
    include "../../includes/connect.php";

    $user = trim($_GET["username"]);
    $email = trim($_GET["email"]);
    $anon = trim($_GET["anon"]);
    $comment = trim($_GET["comment"]);

    if($anon == "yes")
        $anon = 1;
    else
        $anon = 0;

    $query = "INSERT INTO {$db_table} (`ID`, `Username`, `E-Mail`, `Date`, `Anonimous`, `Comment`) VALUE (NULL, '$user', '$email', CURRENT_TIMESTAMP, '$anon', '$comment')";

    $result = $mysqli->query($query);
    if (!$result)
        die("Query failed");
                
    $mysqli->close();

function Redirect($permanent = true){
    if (headers_sent() === false) {
    	header('Location: ../commenti.php', true, ($permanent === true) ? 301 : 302);
    }
    exit();
}
Redirect('login.php', false);
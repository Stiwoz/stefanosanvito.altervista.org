<?php
    include "../includes/connect.php";

    $user = trim($_REQUEST["username"]);
    $email = trim($_REQUEST["email"]);
    $anon = trim($_REQUEST["anon"]);
    $comment = trim($_REQUEST["comment"]);

    if($anon == "yes")
        $anon = 1;
    else
        $anon = 0;

    $query = "INSERT INTO $db_table(Username, E-Mail, Date, Anonymous, Comment) VALUES('$user', '$email', CURRENT_TIMESTAMP, '$anon', '$comment')";

    $result = $mysqli->query($query);
    if (!$result)
        die("Query failed");
                
    $mysqli->close();

function Redirect($url, $permanent = false) {
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}
Redirect('../commenti.php', false);
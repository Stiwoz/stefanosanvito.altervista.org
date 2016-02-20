<?php

    //Put form elements into post variables (this is where you would sanitize your data)
    $user = trim($_GET["username"]);
    $email = trim($_GET["email"]);
    $anon = trim($_GET["anon"]);
    $comment = trim($_GET["comment"]);

    $server_name = "localhost";
    $db_username = "stefanosanvito";
    $db_password = "";
    $db_name = "my_stefanosanvito";
    $db_table = "comments";

    if($anon == "yes")
        $anon = 1;
    else
        $anon = 0;

    $conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);
    if (!$conn)
        die("Can't connect to database");

    $sql = "INSERT INTO {$db_table} (`ID`, `Username`, `E-Mail`, `Date`, `Anonimous`, `Comment`) VALUE (NULL, '$user', '$email', CURRENT_TIMESTAMP, '$anon', '$comment')";

    $result = mysqli_query($conn, $sql);
    if (!$result)
        die("Query failed");
                
    mysqli_free_result($result);

function Redirect($permanent = true)
{
    if (headers_sent() === false)
    {
    	header('Location: commenti.php', true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

Redirect('login.php', false);
?>
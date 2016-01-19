<?php

    //Put form elements into post variables (this is where you would sanitize your data)
    $name = trim($_POST["name"]);
    $surname = trim($_POST["surname"]);
    $email = trim($_POST["email"]);
    $date = trim($_POST["date"]);

    $servername = "localhost";
    $username = "stefanosanvito";
    $password = "";
    $dbname = "my_stefanosanvito";
    $dbtable = "logged_users";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn)
        die("Can't connect to database");

    $sql = "INSERT INTO {$dbtable} (`ID`, `Nome`, `Cognome`, `E-Mail`, `Data di Nascita`) VALUE (NULL, '$name', '$surname', '$email', STR_TO_DATE('$date', '%Y-%m-%d'))";

    $result = mysqli_query($conn, $sql);
    if (!$result)
        die("Query to show fields from table failed");
                
    mysqli_free_result($result);

function Redirect($permanent = true)
{
    if (headers_sent() === false)
    {
    	header('Location: login.php', true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

Redirect('login.php', false);
?>
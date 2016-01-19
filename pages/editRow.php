<?php
        $ID = trim($_GET['ID']);
        $name = trim($_GET['name']);
        $surname = trim($_GET['surname']);
        $email = trim($_GET['email']);
        $date = $_GET['date'];

        $servername = "localhost";
        $username = "stefanosanvito";
        $password = "";
        $dbname = "my_stefanosanvito";
        $dbtable ="logged_users";
                
        $sql = "UPDATE ".$dbtable." SET `Nome`=".$name." `Cognome`=".$surname." `E-Mail`=".$email." `Data di Nascita`=".$date." WHERE ID=".$ID;

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn)
            die("Can't connect to database");
                    
        $result = mysqli_query($conn, $sql);
        if (!$result)
            die("Query to show fields from table failed");
        mysqli_free_result($result);
?>
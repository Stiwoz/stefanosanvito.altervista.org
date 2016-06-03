<?php
        include "../../includes/connect.php";
        $ID = trim($_GET['ID']);
        $name = trim($_GET['name']);
        $surname = trim($_GET['surname']);
        $email = trim($_GET['email']);
        $date = $_GET['date'];
                
        $query = "UPDATE ".$dbtable." SET `Nome`=".$name." `Cognome`=".$surname." `E-Mail`=".$email." `Data di Nascita`=".$date." WHERE ID=".$ID;
                    
        $result = $mysqli->query($query);
        if (!$result)
            die("Query to show fields from table failed");
        $mysqli->close();
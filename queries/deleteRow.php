<?php
        include "../includes/connect.php";
        $n = trim($_GET['n']);
                
        $query = "DELETE FROM ".$dbtable." WHERE ID = ".$n;
                    
        $result = $mysqli->query($query);
        if (!$result)
            die("Query to show fields from table failed");
        $mysqli->close();
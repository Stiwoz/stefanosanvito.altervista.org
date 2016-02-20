<?php
        $n = trim($_GET['n']);
        $servername = "localhost";
        $username = "stefanosanvito";
        $password = "";
        $dbname = "my_stefanosanvito";
        $dbtable ="logged_users";
                
        $sql = "DELETE FROM ".$dbtable." WHERE ID = ".$n;

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn)
            die("Can't connect to database");
                    
        $result = mysqli_query($conn, $sql);
        if (!$result)
            die("Query to show fields from table failed");
        mysqli_free_result($result);
?>
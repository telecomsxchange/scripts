<?php

// Postgres Database connection 

$connStr = "host=localhost port=5432 dbname=DBNAME user=DBUSER ";
$conn = pg_connect($connStr);


// Open CSV file and execute query.


if (($handle = fopen("list.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $id = $data[0];
                $qry = "DELETE FROM TABLENAME WHERE id = '$id'";
                pg_query($conn, $qry);
                echo "$qry\n";
        }
        fclose($handle);
}

?>

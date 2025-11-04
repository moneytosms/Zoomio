<?php 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASS = 'root';
    $DB_NAME = 'carproject';

    // Try to connect to the database directly.
    $con = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    // Helper to import SQL file using a connection that may not have a default DB
    function import_sql_file($conn, $sqlFilePath){
        if(!file_exists($sqlFilePath)){
            echo 'SQL file not found: ' . $sqlFilePath;
            return false;
        }
        $sql = file_get_contents($sqlFilePath);
        if($sql === false){
            echo 'Could not read SQL file at: ' . $sqlFilePath;
            return false;
        }

        if(!mysqli_multi_query($conn, $sql)){
            echo 'Error importing SQL: ' . mysqli_error($conn);
            return false;
        }

        // flush multi_query results
        do {
            if ($res = mysqli_store_result($conn)) {
                mysqli_free_result($res);
            }
        } while (mysqli_more_results($conn) && mysqli_next_result($conn));

        return true;
    }

    $sqlFile = __DIR__ . '/database/carproject.sql';

    if(!$con){
        // The database probably doesn't exist. Connect without specifying database
        $tmp = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
        if(!$tmp){
            // Could not connect to MySQL server at all
            echo 'please check your Database server connection: ' . mysqli_connect_error();
            exit;
        }

        // Import schema and data
        import_sql_file($tmp, $sqlFile);

        mysqli_close($tmp);

        // Try reconnecting to the newly created database
        $con = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        if(!$con){
            echo 'Failed to connect to database after import: ' . mysqli_connect_error();
            exit;
        }
    } else {
        // Connected to the database, but it may be empty (no tables). Check for a known table.
        $check = mysqli_query($con, "SHOW TABLES LIKE 'admin'");
        if($check && mysqli_num_rows($check) === 0){
            // No admin table found -> import schema
            $tmp = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
            if($tmp){
                import_sql_file($tmp, $sqlFile);
                mysqli_close($tmp);
                // Re-select database to ensure tables are available on $con
                mysqli_select_db($con, $DB_NAME);
            } else {
                echo 'Could not open auxiliary connection for import: ' . mysqli_connect_error();
            }
        }
    }

?>
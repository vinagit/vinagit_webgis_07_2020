<?php
    define("PG_DB","vinagit_thang7");
    define("PG_HOST","localhost");
    define("PG_USER","postgres");
    define("PG_PORT","5433");
    define("PG_PASS","****");
    
    $dbcon=pg_connect("dbname=".PG_DB." user=".PG_USER." password=".PG_PASS." host=".PG_HOST." port=".PG_PORT);
?>
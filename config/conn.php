<?php

require_once 'env.php';

class Connection extends PDO
{

    public function __construct()
    {
        try {
            $host = DB_HOST;
            $port = DB_PORT;
            $name = DB_NAME;
            $user = DB_USER;
            $pass = DB_PASS;

            $dsn = "mysql:host=$host;port=$port;dbname=$name;charset=utf8mb4";
            parent::__construct($dsn, $user, $pass);

            parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo '<p>Se ha presentado un error al conectarse a la base de datos...<p>';

            $msg = "Error PDO: {$e->getMessage()}";
            echo "<script>console.error(\"$msg\")</script>";
            exit;
        }
    }
}

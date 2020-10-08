<?php
class Dbh
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "SiteNV2";

    protected function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName . ';charset=utf8';
        try {
            $pdo = new PDO($dsn, $this->user, $this->password);
        } catch (Exception $e) {
            die("Erreur:" . $e->getMessage());
        }
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}

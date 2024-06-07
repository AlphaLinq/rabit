<?php
class Dbh
{
    //Adatbázis adatainak beállítása
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "projekt";


    //Csatlakozás a mysql adatbázishoz
    protected function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database . ';charset=utf8';
        $conn = new PDO($dsn, $this->user, $this->password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);     //Fetch asszociatív tömbbe rakja az adatokat
        return $conn;
    }

    public function create_tables(){

        if(isset($_SESSION['tables_created']) && $_SESSION['tables_created'] == true){
            return;
        }
        $dsn = 'mysql:host=' . $this->host . ';charset=utf8';
        $conn = new PDO($dsn,$this->user,$this->password);
        
        $sql = "CREATE DATABASE IF NOT EXISTS $this->database";
        $conn->exec($sql);

        if(isset($_SESSION['tables_created']) && $conn->query($sql) !== TRUE){
            echo "Hiba az adatbázis összekapcsolása közben!";
        }

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database . ';charset=utf8';
        $conn = new PDO($dsn,$this->user,$this->password);

        $sql = "CREATE TABLE IF NOT EXISTS users
                    (id INT(8) NOT NULL AUTO_INCREMENT,
                    name VARCHAR(255) NOT NULL,
                    PRIMARY KEY (id))";
        $conn->exec($sql);
        $sql = "CREATE TABLE IF NOT EXISTS advertisements
                (id INT(8) NOT NULL AUTO_INCREMENT,
                userid INT(8) NOT NULL,
                title VARCHAR(255) NOT NULL,
                PRIMARY KEY (id),
                FOREIGN KEY (userid) REFERENCES users(id))";
        $conn->exec($sql);
        $_SESSION['tables_created'] = true;
    }
}

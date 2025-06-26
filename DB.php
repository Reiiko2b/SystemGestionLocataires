<?php

class DB {
    private static $pdo = null;

    public static function connectBdd(){
        if(self::$pdo === null){
            require_once __DIR__.'./src/db_connec.php.inc';
            $dsn ="mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=$db_charset";
            
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            try {
                self::$pdo = new PDO($dsn, $db_user, $db_pass, $options);
            }catch(PDOException $e){
                die("Database connection failed: ". $e->getMessage());
            }
        }
        return self::$pdo;
    }

    public static function saveUser($user, $mail){
        $verifyExistence = "SELECT COUNT(*) FROM users WHERE mail = ?";
        $result = self::$pdo->prepare($verifyExistence);
        $result->execute([$mail]);
        $nRows = $result->fetchColumn();
        echo $nRows;
        if($nRows !=0 ){
            echo '❌Email déjà utilisé !';
            die;
        }
        else{
            try{

                $sql = "INSERT INTO users (username, mail, valid) VALUES (?, ?, ?);";
                self::$pdo->prepare($sql)->execute([$user, $mail, 0]);

            }catch(Exception $e){
                echo "<script>alert($e)</script>";
            }
        }

    }
    public static function savePassword($password, $mail)
    {
        try{
            $sql = "INSERT INTO users ('password') VALUES (?) WHERE mail = ?;";
            self::$pdo->prepare($sql)->execute([$password, $mail]);
        }catch(Exception $e){
            echo $e;
        }

    }
}

?>
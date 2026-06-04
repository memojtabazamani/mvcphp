<?php 
class Database {
	private PDO $pdo;
	
	public function __construct   () {
		try {

            $host = 'localhost';
        $dbname = 'mvcphp';
        $username = 'root';
        $password = '';

        $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";

        $this->pdo = new PDO(
            $dsn,
            $username,
            $password
        );

        } catch(PDOException $e) {

            echo $e->getMessage();
        }
		
	}
	
	public function connection(): PDO
    {
        return $this->pdo;
    }
}
?>
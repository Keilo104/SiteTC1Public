<?php

class DatabaseConnection {
	private static $instance;
	private $config;
	private $conn;

	private function __construct() {
		$this->config = parse_ini_file($_SESSION["root"] . 'php/Configuration/databaseConfig.ini.php');
		$host = $this->config['POSTGRES_HOST'];
        $port = $this->config['POSTGRES_PORT'];
		$endpoint = $this->config['POSTGRES_ENDPOINT'];
		$dbname = $this->config['POSTGRES_DATABASE'];
		$username = $this->config['POSTGRES_USER'];
		$password = $this->config['POSTGRES_PASSWORD'];

		$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;options='endpoint=$endpoint'; sslmode=require";
		try {
			$this->conn = new PDO($dsn, $username, $password);
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		} catch (Exception $ex) {
			die('Unable to connect: ' . $ex->getMessage());
		}
	}
	
    public static function getInstance()
	{
		if(!self::$instance)
		{
			self::$instance = new DatabaseConnection();
		}

		return self::$instance;
	}

	public function getConnection()
	{
		return $this->conn;
	}

}

?>
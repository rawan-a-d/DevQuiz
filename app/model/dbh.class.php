<?php

class Dbh {
	// db connection
	private $host= "studmysql01.fhict.local";
	private $port = "81";
	private $username = "dbi414572";
	private $password = "password";
	private $db = "dbi414572";

	protected function connect() {
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->db;
        $pdo = new PDO($dsn,$this->username,$this->password);
      	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

        return $pdo;
    }
}

?>
<?php

class Dbh {
	// db connection
	// private $host= $config['host'];
	// private $port = $config['port'];
	// private $username = $config['username'];
	// private $password = $config['password'];
	// private $db = $config['dbname'];

	protected function connect() {
      // Load configuration as an array. Use the actual location of your configuration file
      $config = parse_ini_file('config/config.ini');

       //  $dsn = 'mysql:host='.$this->host.';dbname='.$this->db;
       //  $pdo = new PDO($dsn,$this->username,$this->password);
      	// $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

      	$dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
        $pdo = new PDO($dsn,$config['username'],$config['password']);
      	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

        return $pdo;
    }
}

?>
<?php

    $host='127.0.0.1';
		$port='3306';
		$dbname='dbi414572';
		$user='dbi414572';
		$pass='password';
        $db = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$dbname,$user,$pass);
?>
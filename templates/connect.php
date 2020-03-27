<?php

    $host='127.0.0.1';
		$port='3306';
		$dbname='devquiz';
		$user='root';
		$pass='';
        $db = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$dbname,$user,$pass);
?>
<?php
	
    $dsn = 'mysql:host=localhost;dbname=jim_team_member';
    $username = 'jim_member';
    $password = 'midterm2015';
	/*
   $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
   $username = 'mgs_user';
   $password = 'pa55word';	
	*/
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>

<?php
    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
    $username = 'mgs_user';
    $password = 'pa55word';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
<?php // DATABASE CONNECTION CALL
$connection = mysqli_connect ( 'localhost', 'mgs_user', 'pa55word', 'my_guitar_shop1' );
if (! $connection) {
	die ( '<div class="alert alert-danger" role="alert">
		<b>The database did not connect: ' . mysqli_error ($connection) ) . '</b></div>';
}
?>
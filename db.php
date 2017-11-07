<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

/*define('DATABASE', 'pp285');
define('USERNAME', 'pp285');
define('PASSWORD', 'tOLTS1FCy');
define('CONNECTION', 'sql.njit.edu');
*/
$dsn = 'mysql:dbname=pp285;host=sql.njit.edu';
$user = 'pp285';
$password = 'tOLTS1FCy';
$conn = NULL;

//Create connection
try{
	$db = new PDO($dsn, $user, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo 'Connected successfully<br>';
}catch (PDOException $e){
	echo 'Connection failed: ' . $e->getMessage() . '<br>';
}

$sql = "SELECT * FROM accounts WHERE id < 6";
$statement = $db->prepare($sql);
$statement->execute();
$count = $statement->rowCount();
print 'There are ' . $count . ' records in set<br>';
$recordSet = $statement->fetchAll();

//print_r($recordSet);

echo '<html><body><table>';
foreach ($recordSet as $record){
	//echo '<html><body><table>';
	echo '<tr>';
	echo '<td>' . $record['id'] .'</td>';
	echo '<td>' . $record['email'] .'</td>';
	echo '<td>' . $record['fname'] .'</td>';
	echo '<td>' . $record['phone'] .'</td>';
	echo '<td>' . $record['birthday'] .'</td>';
	echo '<td>' . $record['gender'] .'</td>';
	echo '<td>' . $record['password'] .'</td>';
	echo '</tr>';
}
echo '</table></body></html>';

/*$sql = "CREATE TABLE users10(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	reg_date TIMESTAMP
	)";

try{
	$db->exec($sql);
}catch(PDOException $e){
	echo $sql . '<br>' . $e->getMessage();
}
echo 'done';*/
?>

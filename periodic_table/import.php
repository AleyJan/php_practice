<?php

$host   = 'localhost';
$user   = 'root';
$pass   = '';                 
$dbname = 'periodic_table';


$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}


$conn->query("CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4");
$conn->select_db($dbname);


$conn->query("
    CREATE TABLE IF NOT EXISTS elements (
        number   INT          NOT NULL PRIMARY KEY,
        symbol   VARCHAR(3)   NOT NULL,
        name     VARCHAR(20)  NOT NULL,
        mass     DECIMAL(8,3) NOT NULL,
        category VARCHAR(20)  NOT NULL,
        grp      TINYINT      NOT NULL,
        period   TINYINT      NOT NULL
    )
");


$elements = require __DIR__ . '/data.php';


$stmt = $conn->prepare("
    INSERT INTO elements (number, symbol, name, mass, category, grp, period)
    VALUES (?, ?, ?, ?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE
        symbol = VALUES(symbol), name = VALUES(name), mass = VALUES(mass),
        category = VALUES(category), grp = VALUES(grp), period = VALUES(period)
");


$count = 0;
foreach ($elements as $e) {
    [$number, $symbol, $name, $mass, $category, $grp, $period] = $e;
    $stmt->bind_param('issdsii', $number, $symbol, $name, $mass, $category, $grp, $period);
    $stmt->execute();
    $count++;
}


$stmt->close();
$conn->close();
echo "Done. Imported/updated {$count} elements into database '{$dbname}'.";
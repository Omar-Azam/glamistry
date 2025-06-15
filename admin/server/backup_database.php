<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'your_database_name';
$filename = "backup_" . $dbName . "_" . date("Y-m-d_H-i-s") . ".sql";

header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=\"$filename\"");
header('Pragma: no-cache');
header('Expires: 0');

passthru("mysqldump -h $host -u $user -p$pass $dbName");
exit;
?>

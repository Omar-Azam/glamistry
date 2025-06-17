<?php
putenv('PATH=' . getenv('PATH') . ';C:\\xampp\\mysql\\bin');

$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'glamistry';
$filename = "backup_" . $dbName . "_" . date("Y-m-d_H-i-s") . ".sql";

header('Content-Type: application/sql');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Pragma: no-cache');
header('Expires: 0');

// $mysqldumpPath = '"C:\\xampp\\mysql\\bin\\mysqldump.exe';

$command = "mysqldump --user={$user} --password={$pass} --host={$host} {$dbName}";

// passthru("mysqldump -h $host -u $user -p$pass $dbName");
passthru($command);
exit;
?>

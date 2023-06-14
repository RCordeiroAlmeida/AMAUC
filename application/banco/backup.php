<?php
$dbHost = 'localhost';
$dbName = 'amauc';
$dbUser = 'root';
$dbPass = '';
$backupPath = 'C:/xampp/htdocs/amauc/sge/application/banco/';

$backupFile = $backupPath . 'backup_' . date('Y-m-d') . '.sql';

$command = "mysqldump --user={$dbUser} --password={$dbPass} --host={$dbHost} {$dbName} > {$backupFile}";
exec($command);
?>
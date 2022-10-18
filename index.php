<?php

$dbHost = 'localhost';
$dbUser = '';
$dbPassword = '';
$dbName = '';

$siteRootPath = realpath(__DIR__ . '/..');
$dbDampDirPath = "{$siteRootPath}/dev_workcode_db";
$dbDampFilePath = "{$dbDampDirPath}/{$dbName}.sql";

$timeString = time();
$timeString = strval($timeString);

shell_exec("mkdir {$dbDampDirPath}");
shell_exec("mysqldump -h {$dbHost} -u {$dbUser} --password='{$dbPassword}' {$dbName} > {$dbDampFilePath}");
shell_exec("cd .. && tar --exclude=\"dev_workcode_backup\" -czvf dev_workcode_backup/{$timeString}.tar.gz .");

print 'Done';

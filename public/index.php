<?php
include_once "../vendor/autoload.php";

/*
 * Format:
 * 'domain' => ['Project name', '/path/to/project/files', debugMode]
 */
$projects = [
    $_SERVER['HTTP_HOST'] => ['Myapp', '../src', true],
];

$app = new Frame\Core\Init($projects);

// Start 'em up
$app->run();

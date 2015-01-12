<?php
include_once "../vendor/autoload.php";

use Frame\Core\Init;
use Frame\Core\Project;
use Frame\Response\Phtml;

/*
 * 2 options for configuring a project (both are identical):
 * - Instantiate a Project object
 * - Via an array
 *
 * Parameters (order matters):
 * - Project namespace
 * - Path to project namespace files
 * - Debug mode
 */
$projects = [
    'localhost' => ['Myapp', '../src', true],
    'frame.johnginsberg.com' => new Project('Myapp', '../src', true),
];

$app = new Init($projects);

// Configure custom 404 handler
$app->onRouteNotFound(function($data) {
    $response = new Phtml($data['project']);
    $response
        ->setStatusCode(404)
        ->setViewDir('../src/Frame/Core/Scripts')
        ->setViewFilename('error.phtml')
        ->setViewParams([
            'project' => $data['project'],
            'url' => $data['url'],
            'statusCode' => 404,
            'message' => 'Something went horribly wrong!'
        ])
        ->render();
});

// Start 'em up
$app->run();

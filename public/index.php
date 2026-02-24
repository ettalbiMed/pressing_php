<?php

use CodeIgniter\Boot;
use Config\Paths;

// Path to the front controller
if (! defined('FCPATH')) {
    define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
}

require FCPATH . '../app/Config/Paths.php';

$paths = new Paths();

$bootFile = rtrim($paths->systemDirectory, '/\\') . '/Boot.php';
if (! is_file($bootFile)) {
    http_response_code(500);
    echo 'Dependencies missing or incomplete. Run composer install.';
    exit(1);
}

// LOAD THE FRAMEWORK BOOTSTRAP FILE
require $bootFile;

exit(Boot::bootWeb($paths));

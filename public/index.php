<?php

use CodeIgniter\Boot;
use Config\Paths;

// Path to the front controller
if (! defined('FCPATH')) {
    define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
}

require FCPATH . '../app/Config/Paths.php';

$rootPath = dirname(__DIR__) . DIRECTORY_SEPARATOR;
if (basename(__DIR__) !== 'public') {
    $rootPath = __DIR__ . DIRECTORY_SEPARATOR;
}

defined('ROOTPATH') || define('ROOTPATH', $rootPath);
defined('VENDORPATH') || define('VENDORPATH', ROOTPATH . 'vendor' . DIRECTORY_SEPARATOR);
defined('COMPOSER_PATH') || define('COMPOSER_PATH', VENDORPATH . 'composer' . DIRECTORY_SEPARATOR);

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

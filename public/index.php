<?php

if (! defined('FCPATH')) {
    define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
}

if (! defined('ROOTPATH')) {
    define('ROOTPATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
}

if (! defined('APPPATH')) {
    define('APPPATH', ROOTPATH . 'app' . DIRECTORY_SEPARATOR);
}

require ROOTPATH . 'app/Config/Paths.php';

$paths = new Config\Paths();

if (! defined('SYSTEMPATH')) {
    define('SYSTEMPATH', realpath($paths->systemDirectory) . DIRECTORY_SEPARATOR);
}

if (! is_file(ROOTPATH . 'vendor/autoload.php')) {
    http_response_code(500);
    echo 'Dependencies missing. Run composer install.';
    exit(1);
}

require ROOTPATH . 'vendor/autoload.php';
require SYSTEMPATH . 'bootstrap.php';

exit(CodeIgniter\CodeIgniter::run());

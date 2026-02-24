<?php

// --------------------------------------------------------------------
// ENVIRONMENT
// --------------------------------------------------------------------

defined('ENVIRONMENT') || define('ENVIRONMENT', $_SERVER['CI_ENVIRONMENT'] ?? 'production');

// --------------------------------------------------------------------
// APP PATHS
// --------------------------------------------------------------------

defined('WRITEPATH') || define('WRITEPATH', realpath(__DIR__ . '/../../writable') . DIRECTORY_SEPARATOR);
defined('APPPATH') || define('APPPATH', realpath(__DIR__ . '/..') . DIRECTORY_SEPARATOR);
defined('ROOTPATH') || define('ROOTPATH', realpath(APPPATH . '../') . DIRECTORY_SEPARATOR);
defined('SYSTEMPATH') || define('SYSTEMPATH', realpath(ROOTPATH . 'vendor/codeigniter4/framework/system') . DIRECTORY_SEPARATOR);
defined('FCPATH') || define('FCPATH', ROOTPATH . 'public' . DIRECTORY_SEPARATOR);

// --------------------------------------------------------------------
// EXIT STATUS CODES
// --------------------------------------------------------------------

defined('EXIT_SUCCESS') || define('EXIT_SUCCESS', 0);
defined('EXIT_ERROR') || define('EXIT_ERROR', 1);
defined('EXIT_CONFIG') || define('EXIT_CONFIG', 3);
defined('EXIT_UNKNOWN_FILE') || define('EXIT_UNKNOWN_FILE', 4);
defined('EXIT_UNKNOWN_CLASS') || define('EXIT_UNKNOWN_CLASS', 5);
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6);
defined('EXIT_USER_INPUT') || define('EXIT_USER_INPUT', 7);
defined('EXIT_DATABASE') || define('EXIT_DATABASE', 8);
defined('EXIT__AUTO_MIN') || define('EXIT__AUTO_MIN', 9);
defined('EXIT__AUTO_MAX') || define('EXIT__AUTO_MAX', 125);

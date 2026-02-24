<?php

namespace Config;

class Paths
{
    public string $systemDirectory;
    public string $appDirectory;
    public string $writableDirectory;
    public string $testsDirectory;
    public string $viewDirectory;

    public function __construct()
    {
        $root = dirname(__DIR__, 2);

        $this->systemDirectory   = $root . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'codeigniter4' . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'system';
        $this->appDirectory      = $root . DIRECTORY_SEPARATOR . 'app';
        $this->writableDirectory = $root . DIRECTORY_SEPARATOR . 'writable';
        $this->testsDirectory    = $root . DIRECTORY_SEPARATOR . 'tests';
        $this->viewDirectory     = $this->appDirectory . DIRECTORY_SEPARATOR . 'Views';

        if (! is_dir($this->writableDirectory)) {
            @mkdir($this->writableDirectory, 0775, true);
        }
    }
}

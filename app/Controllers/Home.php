<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $site = config('Site')->site;

        return view('home/index', [
            'site' => $site,
        ]);
    }
}

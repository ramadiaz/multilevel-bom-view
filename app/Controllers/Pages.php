<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function bomForm(): string {
        return view('regist_bom');
    }
}

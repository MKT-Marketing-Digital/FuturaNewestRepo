<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigClearController extends Controller
{
    public function index(){
        echo php artisan config:clear;
    }
}

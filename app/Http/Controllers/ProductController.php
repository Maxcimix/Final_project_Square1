<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __invoke():View
    {
        return view('pages.product');
    }
}

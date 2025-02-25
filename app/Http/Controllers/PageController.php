<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function news()
    {
        return view('pages.news');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function support()
    {
        return view('pages.support');
    }

    public function invoicing()
    {
        return view('pages.invoicing');
    }

    public function contract()
    {
        return view('pages.contract');
    }

    public function careers()
    {
        return view('pages.careers');
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function faq()
    {
        return view('pages.faq');
    }
}
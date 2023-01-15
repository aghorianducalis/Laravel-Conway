<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    /**
     * Display the template.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function home()
    {
        return view('welcome');
    }

    /**
     * Display the template.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('conway');
    }
}

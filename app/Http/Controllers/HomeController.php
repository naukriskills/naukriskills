<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.dashboard');
    }


    public function adminIndex()
    {
        return view('admin.dashboard');
    }


    public function superadminIndex()
    {
        return view('superadmin.dashboard');
    }



    public function companyIndex()
    {
        return view('company.dashboard');
    }

    public function partnerHome()
    {
        return view('partner.dashboard');
    }
}

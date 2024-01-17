<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function index()
    {
        return view('front.reports.index', [
        ]);
    }
}

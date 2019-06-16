<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class GisController extends Controller
{
    public function index()
    {
        return view('gis.gis');
    }
}

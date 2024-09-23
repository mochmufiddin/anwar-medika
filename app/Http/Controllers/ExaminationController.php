<?php

namespace App\Http\Controllers;


class ExaminationController extends Controller
{
    public function index()
    {
        return view('admin.examination.index');
    }
}

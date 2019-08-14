<?php
namespace App\Http\Controllers;

class TestController extends Controller
{

    public function index($filter = '')
    {

        return view('test');
    }
}

<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $responsive = 'desk')
    {
        $test = $request->user()->authorizeRoles(['blogger']);
        return view('blog', ['responsive' => $responsive, 'test' => $test]);
    }

    public function create(Request $request)
    {
        return view('sets', compact('items'));
    }

    public function update(Request $request)
    {
        return view('sets', compact('items'));
    }

    public function delete(Request $request)
    {
        return view('sets', compact('items'));
    }
}

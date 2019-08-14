<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $pages = DB::table('pages')->get();
        if ($user->superuser == 1) {
            return view('admin.index', ['pages' => $pages, 'user' => $user]);
        } else {
            return view('error.404');
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        DB::table('pages')->where('id', $request->input('id'))->update(['title' => $request->input('title'), 'body' => $request->input('text')]);
        $pages = DB::table('pages')->get();

        if ($user->superuser == 1) {
            return view('admin.index', ['pages' => $pages, 'user' => $user]);
        } else {
            return view('error.404');
        }
    }
}

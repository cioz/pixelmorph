<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminSkillsController extends Controller
{

    public function index(Request $request)
    {

        $user = Auth::user();
        $skills = DB::table('skills')->get();
        $cats = DB::table('skillscats')->get();
        return view('admin.skills', ['skills' => $skills, 'cats' => $cats, 'user' => $user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        DB::table('skills')->where('id', $request->input('id'))->update([
            'title' => $request->input('title'),
            'skillscats_id' => $request->input('skillscat'),
            'perc' => $request->input('perc'),
            'icon' => $request->input('icon'),
            'image' => $request->input('image'),
            'description' => $request->input('text'),
        ]);
        $skills = DB::table('skills')->get();
        $cats = DB::table('skillscats')->get();

        if ($user->superuser == 1) {
            return view('admin.skills', ['skills' => $skills, 'cats' => $cats, 'user' => $user]);
        } else {
            return view('error.404');
        }
    }

}

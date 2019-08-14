<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WgController extends Controller
{

    public function index($responsive = 'desk', $url = '')
    {
        $user = Auth::user();
        if ($url != '') {
            $content = DB::select('SELECT content FROM wg_content WHERE url = ? ', [$url]);
            if ($content) {
                if ($responsive == 'desk') {
                    return view('desk.wg', ['content' => $content, 'responsive' => $responsive, 'user' => $user]);
                } else {
                    return view('mobile.wg', ['content' => $content, 'responsive' => $responsive, 'user' => $user]);
                }
            } else {
                return redirect()->action('HomeController@index');
            }
        } else {
            return redirect()->action('HomeController@index');
        }
    }

}

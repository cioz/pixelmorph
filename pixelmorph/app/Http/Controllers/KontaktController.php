<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KontaktController extends Controller
{
    public function index(Request $request, $responsive = 'desk')
    {

        $user = Auth::user();
        if ($responsive == 'desk') {
            return view('desk.kontakt', ['responsive' => $responsive, 'message' => false, 'user' => $user]);
        } else {
            return view('mobile.kontakt', ['responsive' => $responsive, 'message' => false, 'user' => $user]);
        }
    }

    public function send(Request $request, $responsive = 'desk')
    {

        /*
        $name = $request->input('text');
        $name = 'ass';
        Mail::to('info@pixelmorph.de')->send(new SendMailable($name));
         */

        DB::table('kontakt')->insert([
            'created' => new DateTime(),
            'from' => $request->input('user'),
            'email' => $request->input('email'),
            'reason' => $request->input('woher'),
            'message' => $request->input('text'),
        ]);
        $message = true;

        $user = Auth::user();
        if ($responsive == 'desk') {
            return view('desk.kontakt', ['responsive' => $responsive, 'user' => $user, 'message' => $message]);
        } else {
            return view('mobile.kontakt', ['responsive' => $responsive, 'user' => $user, 'message' => $message]);
        }
    }
}

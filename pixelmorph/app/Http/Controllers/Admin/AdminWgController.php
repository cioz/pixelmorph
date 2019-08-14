<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminWgController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $items = DB::table('wg_content')->orderBy('id', 'desc')->get();
        $itemstext = DB::table('wg_text')->orderBy('id', 'desc')->get();

        return view('admin.wg', ['items' => $items, 'itemstext' => $itemstext, 'newurl' => $this->getToken(), 'user' => $user]);
    }

    public function send($id = 0)
    {
        $user = Auth::user();
        $items = DB::table('wg_content')->orderBy('id', 'desc')->get();
        $itemstext = DB::table('wg_text')->orderBy('id', 'desc')->get();

        $email = DB::table('wg_content')->where('id', $id)->first();
        $to = $email->email;
        $subject = 'WG-Gesucht';
        $message = $email->content;
        $headers = 'From: Dirk Hedtke' . "\r\n" .
        'Reply-To: wg@pixelmorph.de' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        $msg = 'Die Nachricht wurde an ' . $email->email . ' verschickt.';

        return view('admin.wg', ['items' => $items, 'itemstext' => $itemstext, 'newurl' => $this->getToken(), 'user' => $user, 'msg' => $msg]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if ($request->input('active') == 'on') {
            $active = 1;
        } else {
            $active = 0;
        }
        DB::table('wg_content')->where('id', $request->input('id'))->update([
            'active' => $active,
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'referenz' => $request->input('referenz'),
            'content' => $request->input('content'),
            'email' => $request->input('email'),
        ]);
        $items = DB::table('wg_content')->orderBy('id', 'desc')->get();
        $itemstext = DB::table('wg_text')->orderBy('id', 'desc')->get();

        if ($user->superuser == 1) {
            return view('admin.wg', ['items' => $items, 'itemstext' => $itemstext, 'newurl' => $this->getToken(), 'user' => $user]);
        } else {
            return view('error.404');
        }
    }

    public function insert(Request $request)
    {
        $user = Auth::user();
        if ($request->input('active') == 'on') {
            $active = 1;
        } else {
            $active = 0;
        }
        $id = DB::table('wg_content')->insertGetId([
            'active' => 1,
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'referenz' => $request->input('referenz'),
            'content' => $request->input('content'),
            'email' => $request->input('email'),
        ]);
        $items = DB::table('wg_content')->orderBy('id', 'desc')->get();
        $itemstext = DB::table('wg_text')->orderBy('id', 'desc')->get();

        if ($user->superuser == 1) {
            return view('admin.wg', ['items' => $items, 'itemstext' => $itemstext, 'newurl' => $this->getToken(), 'user' => $user]);
        } else {
            return view('error.404');
        }
    }

    public function delete($id = 0)
    {
        $user = Auth::user();
        $delObj = DB::table('wg_content')->where('id', $id)->first();
        if (!empty($delObj)) {
            $msg = 'The Entry <b>' . $delObj->title . '</b> has been deleted!';
            $modalclass = 'btnAgree';
            DB::table('wg_content')->where('id', $id)->delete();
        } else {
            $msg = 'The Entry could not be found! Nothing was deleted.';
            $modalclass = 'btnDelete';
        }
        $items = DB::table('wg_content')->orderBy('id', 'desc')->get();
        $itemstext = DB::table('wg_text')->orderBy('id', 'desc')->get();

        if ($user->superuser == 1) {
            return view('admin.wg', ['items' => $items, 'itemstext' => $itemstext, 'newurl' => $this->getToken(), 'msg' => $msg, 'modalclass' => $modalclass, 'user' => $user]);
        } else {
            return view('error.404');
        }
    }

    public function updateText(Request $request)
    {
        $user = Auth::user();
        if ($request->input('active') == 'on') {
            $active = 1;
        } else {
            $active = 0;
        }
        DB::table('wg_text')->where('id', $request->input('id'))->update([
            'active' => $active,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        $items = DB::table('wg_content')->orderBy('id', 'desc')->get();
        $itemstext = DB::table('wg_text')->orderBy('id', 'desc')->get();

        if ($user->superuser == 1) {
            return view('admin.wg', ['items' => $items, 'itemstext' => $itemstext, 'newurl' => $this->getToken(), 'user' => $user]);
        } else {
            return view('error.404');
        }
    }

    public function insertText(Request $request)
    {
        $user = Auth::user();
        if ($request->input('active') == 'on') {
            $active = 1;
        } else {
            $active = 0;
        }
        $id = DB::table('wg_text')->insertGetId([
            'active' => 1,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        $items = DB::table('wg_content')->orderBy('id', 'desc')->get();
        $itemstext = DB::table('wg_text')->orderBy('id', 'desc')->get();

        if ($user->superuser == 1) {
            return view('admin.wg', ['items' => $items, 'itemstext' => $itemstext, 'newurl' => $this->getToken(), 'user' => $user]);
        } else {
            return view('error.404');
        }
    }

    public function deleteText($id = 0)
    {
        $user = Auth::user();
        $delObj = DB::table('wg_text')->where('id', $id)->first();
        if (!empty($delObj)) {
            $msg = 'The Entry <b>' . $delObj->title . '</b> has been deleted!';
            $modalclass = 'btnAgree';
            DB::table('wg_text')->where('id', $id)->delete();
        } else {
            $msg = 'The Entry could not be found! Nothing was deleted.';
            $modalclass = 'btnDelete';
        }
        $items = DB::table('wg_content')->orderBy('id', 'desc')->get();
        $itemstext = DB::table('wg_text')->orderBy('id', 'desc')->get();

        if ($user->superuser == 1) {
            return view('admin.wg', ['items' => $items, 'itemstext' => $itemstext, 'newurl' => $this->getToken(), 'msg' => $msg, 'modalclass' => $modalclass, 'user' => $user]);
        } else {
            return view('error.404');
        }
    }

    public function getToken()
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "0123456789";
        $length = 6;

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[mt_rand(0, strlen($codeAlphabet) - 1)];
        }
        do {
            $code = $token . substr(strftime("%Y", time()), 2);
            $newurl = DB::table('wg_content')->where('url', $code)->get();
        } while (empty($newurl));

        return $code;
    }
}

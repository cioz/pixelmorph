<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminSoundController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $sets = DB::table('sets')->orderBy('released', 'desc')->get();
        $alltags = DB::table('tags')->orderBy('title', 'asc')->get();
        $x = 0;

        foreach ($sets as $set) {
            $tagsets = DB::table('tags_sets')->where('setid', $set->id)->get();
            $i = 0;
            $tagbag = [];
            foreach ($tagsets as $tag) {
                $tagtitle = DB::table('tags')->where('id', $tag->tag)->get();
                $tmp = new tagBag;
                $tmp->tagid = $tag->tag;
                $tmp->tagrate = $tag->rate;
                $tmp->tagname = $tagtitle[0]->title;
                $tagbag[$i] = $tmp;
                $i++;
            }
            $sets[$x]->tagbag = $tagbag;
            $x++;
        }

        if ($user->superuser == 1) {
            return view('admin.sound', ['sets' => $sets, 'tags' => $tagbag, 'alltags' => $alltags, 'user' => $user]);
        } else {
            return view('error.404');
        }
    }

    public function update(Request $request)
    {
        if ($request->input('promo') == 'on') {
            $promo = 1;
        } else {
            $promo = 0;
        }
        if ($request->input('active') == 'on') {
            $active = 1;
        } else {
            $active = 0;
        }

        $user = Auth::user();
        DB::table('sets')->where('id', $request->input('id'))->update([
            'title' => $request->input('title'),
            'promo' => $promo,
            'active' => $active,
            'released' => $request->input('released'),
            'setlength' => $request->input('setlength'),
            'bpm' => $request->input('bpm'),
            'filename' => $request->input('filename'),
            'filetype' => $request->input('filetype'),
            'cover' => $request->input('cover'),
            'description' => $request->input('description'),
        ]);

        if ($request->input('settag')) {
            $i = 0;
            DB::table('tags_sets')->where('setid', $request->input('id'))->delete();
            foreach ($request->input('settag') as $tag) {
                if ($tag != 'delete' && $tag != 'newtag') {
                    DB::table('tags_sets')->insert([
                        'setid' => $request->input('id'),
                        'tag' => $tag,
                        'rate' => $request->input('rate')[$i],
                    ]);
                    $i++;
                }
            }
        }
        if ($request->input('newtag') != 'newtag') {
            DB::table('tags_sets')->insert([
                'setid' => $request->input('id'),
                'tag' => $request->input('newtag'),
                'rate' => $request->input('newrate'),
            ]);
        }

        /* TODO: redundant see index, needs to be fixed */
        $sets = DB::table('sets')->orderBy('released', 'desc')->get();
        $alltags = DB::table('tags')->orderBy('title', 'asc')->get();
        $x = 0;

        foreach ($sets as $set) {
            $tagsets = DB::table('tags_sets')->where('setid', $set->id)->get();
            $i = 0;
            $tagbag = [];
            foreach ($tagsets as $tag) {
                $tagtitle = DB::table('tags')->where('id', $tag->tag)->get();
                $tmp = new tagBag;
                $tmp->tagid = $tag->tag;
                $tmp->tagrate = $tag->rate;
                $tmp->tagname = $tagtitle[0]->title;
                $tagbag[$i] = $tmp;
                $i++;
            }
            $sets[$x]->tagbag = $tagbag;
            $x++;
        }

        if ($user->superuser == 1) {
            return view('admin.sound', ['sets' => $sets, 'tags' => $tagbag, 'alltags' => $alltags, 'user' => $user]);
        } else {
            return view('error.404');
        }
    }

    public function insert(Request $request)
    {
        $user = Auth::user();
        if ($request->input('promo') == 'on') {
            $promo = 1;
        } else {
            $promo = 0;
        }
        if ($request->input('active') == 'on') {
            $active = 1;
        } else {
            $active = 0;
        }

        $id = DB::table('sets')->insertGetId([
            'title' => $request->input('title'),
            'promo' => $promo,
            'active' => $active,
            'released' => $request->input('released'),
            'setlength' => $request->input('setlength'),
            'bpm' => $request->input('bpm'),
            'filename' => $request->input('filename'),
            'filetype' => $request->input('filetype'),
            'cover' => $request->input('cover'),
            'description' => $request->input('description'),
        ]);

        if ($request->input('newtag') != 'new') {
            DB::table('tags_sets')->insert([
                'setid' => $id,
                'tag' => $request->input('newtag'),
                'rate' => $request->input('newrate'),
            ]
            );
        }

        /* TODO: redundant see index, needs to be fixed */
        $sets = DB::table('sets')->get();
        $alltags = DB::table('tags')->get();
        $x = 0;

        foreach ($sets as $set) {
            $tagsets = DB::table('tags_sets')->where('setid', $set->id)->get();
            $i = 0;
            $tagbag = [];
            foreach ($tagsets as $tag) {
                $tagtitle = DB::table('tags')->where('id', $tag->tag)->get();
                $tmp = new tagBag;
                $tmp->tagid = $tag->tag;
                $tmp->tagrate = $tag->rate;
                $tmp->tagname = $tagtitle[0]->title;
                $tagbag[$i] = $tmp;
                $i++;
            }
            $sets[$x]->tagbag = $tagbag;
            $x++;
        }

        if ($user->superuser == 1) {
            return view('admin.sound', ['sets' => $sets, 'tags' => $tagbag, 'alltags' => $alltags, 'user' => $user]);
        } else {
            return view('error.404');
        }

    }

    public function delete($id = 0)
    {
        $user = Auth::user();
        $x = 0;

        $delObj = DB::table('sets')->where('id', $id)->first();
        if (!empty($delObj)) {
            $msg = 'The Set <b>' . $delObj->title . '</b> has been deleted!';
            $modalclass = 'btnAgree';
            DB::table('sets')->where('id', $id)->delete();
        } else {
            $msg = 'The Set could not be found! Nothing was deleted.';
            $modalclass = 'btnDelete';
        }

        $sets = DB::table('sets')->get();
        $alltags = DB::table('tags')->get();

        foreach ($sets as $set) {
            $tagsets = DB::table('tags_sets')->where('setid', $set->id)->get();
            $i = 0;
            $tagbag = [];
            foreach ($tagsets as $tag) {
                $tagtitle = DB::table('tags')->where('id', $tag->tag)->get();
                $tmp = new tagBag;
                $tmp->tagid = $tag->tag;
                $tmp->tagrate = $tag->rate;
                $tmp->tagname = $tagtitle[0]->title;
                $tagbag[$i] = $tmp;
                $i++;
            }
            $sets[$x]->tagbag = $tagbag;
            $x++;
        }

        if ($user->superuser == 1) {
            return view('admin.sound', ['sets' => $sets, 'tags' => $tagbag, 'alltags' => $alltags, 'user' => $user, 'msg' => $msg, 'modalclass' => $modalclass]);
        } else {
            return view('error.404');
        }

    }
}

class tagBag
{
    public function tagBags()
    {
        $this->tagid = 0;
        $this->tagname = 0;
        $this->tagrate = 0;
    }
}

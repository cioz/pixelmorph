<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(Request $request, $responsive = 'desk')
    {
        $user = Auth::user();
        $items = DB::table('pages')->where('meta_description', 'home')->first();
        if (Auth::check()) {
            $items->username = $user['name'];
            $items->check = '(Logged in!)';
        } else {
            $items->username = 'werter Gast';
        }
        $newest = DB::table('sets')->where([['promo', '=', '0'], ['active', '=', '1']])->orderBy('released', 'desc')->first();
        if (!empty($newest)) {
            $tags = DB::table('tags_sets')->where('setid', $newest->id)->orderBy('rate')->get();
            $chart = [];
            $label = [];
            $tags = DB::select('SELECT * FROM tags_sets WHERE setid = ? ORDER BY rate DESC', [$newest->id]);
            foreach ($tags as $tag) {
                $labels = DB::table('tags')->where('id', $tag->tag)->first();
                array_push($chart, $tag->rate);
                array_push($label, $labels->title);
            }
            $newest->label = $label;
            $newest->chart = $chart;
            $newest->released = Helper::convertRelease($newest->released);
        }

        $promo = DB::table('sets')->where([['promo', '=', '1'], ['active', '=', '1'], ['id', '<>', $newest->id]])->orderBy('released', 'desc')->first();
        if (!empty($promo)) {
            $tags = DB::table('tags_sets')->where('setid', $promo->id)->orderBy('rate')->get();
            $chart = [];
            $label = [];
            $tags = DB::select('SELECT * FROM tags_sets WHERE setid = ? ORDER BY rate DESC', [$promo->id]);
            foreach ($tags as $tag) {
                $labels = DB::table('tags')->where('id', $tag->tag)->first();
                array_push($chart, $tag->rate);
                array_push($label, $labels->title);
            }
            $promo->label = $label;
            $promo->chart = $chart;
            $promo->released = Helper::convertRelease($promo->released);
        }

        $tmp = -1;
        do {
            $favdate = date('Y-m-d', strtotime($tmp . ' week'));
            $fav = DB::table('sets_stats')->where('statdate', '>', $favdate)->orderBy('plays', 'desc')->get();

            foreach ($fav as $item) {
                $teaser = DB::table('sets')->where([['id', '=', $item->setid], ['promo', '=', '0'], ['active', '=', '1']])->first();
                if (!empty($teaser)) {
                    break;
                }
            }
            $tmp = $tmp - 1;
        } while (empty($fav));

        if (empty($teaser)) {
            $teaser = DB::table('sets')->where([['promo', '=', '0'], ['active', '=', '1'], ['id', '<>', $newest->id]])->first();
        }

        $teaser = DB::table('sets')->where('id', '33')->first();
        if (!empty($teaser)) {
            $tags = DB::table('tags_sets')->where('setid', $teaser->id)->orderBy('rate')->get();
            $chart = [];
            $label = [];
            $tags = DB::select('SELECT * FROM tags_sets WHERE setid = ? ORDER BY rate DESC', [$teaser->id]);
            foreach ($tags as $tag) {
                $labels = DB::table('tags')->where('id', $tag->tag)->first();
                array_push($chart, $tag->rate);
                array_push($label, $labels->title);
            }
            $teaser->label = $label;
            $teaser->chart = $chart;
            $teaser->released = Helper::convertRelease($teaser->released);
        }

        if ($responsive == 'desk') {
            return view('desk.home', ['responsive' => $responsive, 'items' => $items, 'user' => $user, 'teaser' => $teaser, 'promo' => $promo, 'newest' => $newest]);
        } elseif ($responsive == 'mobile') {
            return view('mobile.home', ['responsive' => $responsive, 'items' => $items, 'user' => $user, 'teaser' => $teaser, 'promo' => $promo, 'newest' => $newest]);
        }
    }

    public function impressum($responsive = 'desk')
    {
        $user = Auth::user();
        if ($responsive == 'desk') {
            return view('desk.impressum');
        } elseif ($responsive == 'mobile') {
            return view('mobile.impressum');
        }
    }

    public function festival($responsive = 'desk')
    {
        $user = Auth::user();
        $desc = DB::table('pages')->where('meta_description', 'festival')->get();
        if ($responsive == 'desk') {
            return view('desk.festival', ['responsive' => $responsive, 'item' => $desc, 'user' => $user]);
        } elseif ($responsive == 'mobile') {
            return view('mobile.festival', ['responsive' => $responsive, 'item' => $desc, 'user' => $user]);
        }
    }
}

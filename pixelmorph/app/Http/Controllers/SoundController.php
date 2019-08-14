<?php
namespace App\Http\Controllers;

use App\Pages;
use Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SoundController extends Controller
{

    public function index($responsive = 'desk', $filter = '')
    {
        $user = Auth::user();
        $desc = Pages::where('status', '1')->where('title', 'Sets')->first();
        DB::table('sets')->where('id', $filter)->increment('clicks');

        $i = 1;
        if ($filter != '') {
            $and = ' AND id IN (';
            $sets = explode(':', $filter);
            foreach ($sets as $set) {
                $and .= $set;
                if (count($sets) > $i) {
                    $and .= ',';
                }
                $i++;
            }
            $and .= ')';
            $subtitle = true;
        } else {
            $and = '';
            $subtitle = false;
        }

        $items = DB::select('SELECT * FROM sets WHERE active = ? ' . $and . ' ORDER BY released DESC LIMIT 6', [1]);
        $taglist = DB::select('SELECT * FROM tags ORDER BY title');

        foreach ($items as $i => $item) {
            $chart = [];
            $label = [];
            $playlists = [];
            $playlist = "";
            $items[$i]->released = Helper::convertRelease($items[$i]->released);
            $playlist = DB::select('SELECT * FROM playlists WHERE set_id = ? ORDER BY position', [$items[$i]->id]);
            if (empty($playlist)) {
                $playlist = false;
            }
            $tags = DB::select('SELECT * FROM tags_sets WHERE setid = ? ORDER BY rate', [$items[$i]->id]);
            foreach ($tags as $tag) {
                $labels = DB::table('tags')->where('id', $tag->tag)->first();
                array_push($chart, $tag->rate);
                array_push($label, $labels->title);
            }
            $items[$i]->chart = $chart;
            $items[$i]->label = $label;
            $items[$i]->playlist = $playlist;
        }

        if ($responsive == 'desk') {
            return view('desk.sound', [
                'responsive' => $responsive,
                'items' => $items,
                'tags' => $taglist,
                'desc' => $desc,
                'user' => $user,
                'subtitle' => $subtitle
            ]);
        } elseif ($responsive == 'mobile') {
            return view('mobile.sound', [
                'responsive' => $responsive,
                'items' => $items,
                'tags' => $taglist,
                'desc' => $desc,
                'user' => $user,
                'subtitle' => $subtitle
            ]);
        }
    }
}

class tagBag
{
    public function tagBag()
    {
        $this->title = "";
        $this->rate = "";
        $this->width = "";
    }
}

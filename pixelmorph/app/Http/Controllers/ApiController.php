<?php
namespace App\Http\Controllers;

use Helper;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function sets($responsive = 'desk', $id = 0)
    {
        if ($id == 0) {
            $desc = DB::select('SELECT * FROM sets WHERE active = ? ORDER BY released', [1]);
        } else {
            $desc = DB::select('SELECT * FROM sets WHERE active = ? AND id = ?', [1, $id]);
        }
        return response()->json($desc);
    }

    public function click($responsive = 'desk', $id = 0)
    {
        if ($this->checkSet($id) === true) {
            $today = date('Y-m-d');
            $date = DB::table('sets_stats')->where([['statdate', '=', $today], ['setid', '=', $id]])->get();
            if ($date->isEmpty()) {
                DB::table('sets_stats')->insert(['statdate' => $today, 'setid' => $id, 'clicks' => 1]);
            } else {
                DB::table('sets_stats')->where([['statdate', '=', $today], ['setid', '=', $id]])->increment('clicks');
            }
        }
        return response()->json(true);
    }

    public function dl($responsive = 'desk', $id = 0)
    {
        if ($this->checkSet($id) === true) {
            $today = date('Y-m-d');
            $date = DB::table('sets_stats')->where([['statdate', '=', $today], ['setid', '=', $id]])->get();
            if ($date->isEmpty()) {
                DB::table('sets_stats')->insert(['statdate' => $today, 'setid' => $id, 'dls' => 1]);
            } else {
                DB::table('sets_stats')->where([['statdate', '=', $today], ['setid', '=', $id]])->increment('dls');
            }
        }
        return response()->json(true);
    }

    public function play($responsive = 'desk', $id = 0)
    {
        if ($this->checkSet($id) === true) {
            $today = date('Y-m-d');
            $date = DB::table('sets_stats')->where([['statdate', '=', $today], ['setid', '=', $id]])->get();
            if ($date->isEmpty()) {
                DB::table('sets_stats')->insert(['statdate' => $today, 'setid' => $id, 'plays' => 1]);
            } else {
                DB::table('sets_stats')->where([['statdate', '=', $today], ['setid', '=', $id]])->increment('plays');
            }
            return response()->json(true);
        }
    }

    public function checkSet($id)
    {
        $set = DB::table('sets')->where('id', $id)->get();
        if ($set->isEmpty()) {
            return false;
        } else {
            return true;
        }
    }

    public function filter($responsive = 'desk', $filter = 0)
    {
        $response = [];
        $maxSets = 10;
        $count = 0;
        $collection = [];
        $req = preg_match('^[0-9]{1,2}([,.][0-9]{1,2})?$^', $filter);

        if ($req == 1) {
            $tags = explode("-", $filter);
            foreach ($tags as $tag) {
                $tag = explode(":", $tag);
                $tag[0] = intval($tag[0]);
                $tag[1] = intval($tag[1]);
                if ($tag[1] > 0) {
                    $sets = DB::select('SELECT * FROM tags_sets WHERE tag = ? ORDER BY rate DESC', [$tag[0]]);
                    foreach ($sets as $set) {
                        $found = array_search($set->setid, array_column($collection, 'setid'));
                        if ($found == false) {
                            $tmp['setid'] = $set->setid;
                            $tmp['rateuser'] = $tag[1] * $set->rate;
                            array_push($collection, $tmp);
                        } else {
                            $collection[$found]['rateuser'] = $collection[$found]['rateuser'] + $tag[1] * $set->rate;
                        }
                    }
                }
            }
        }
        usort($collection, function ($a, $b) {
            if ($a['rateuser'] == $b['rateuser']) {
                return 0;
            }

            return $a['rateuser'] < $b['rateuser'] ? 1 : -1;
        });

        for ($i = 0; $i < count($collection); $i++) {
            $chart = [];
            $label = [];
            $newset = DB::select('SELECT * FROM sets WHERE id = ?', [$collection[$i]['setid']]);
            $newset[0]->playlist = DB::select('SELECT * FROM playlists WHERE set_id = ? ORDER BY position', [$collection[$i]['setid']]);
            if (empty($newset[0]->playlist)) {
                $newset[0]->playlist = false;
            }

            $tags = DB::select('SELECT * FROM tags_sets WHERE setid = ? ORDER BY rate DESC', [$collection[$i]['setid']]);
            foreach ($tags as $tag) {
                $labels = DB::table('tags')->where('id', $tag->tag)->first();
                array_push($chart, $tag->rate);
                array_push($label, $labels->title);
            }
            $newset[0]->chartdata = $chart;
            $newset[0]->chartlabel = $label;
            $newset[0]->userrate = $collection[$i]['rateuser'];
            array_push($response, $newset);
            $count++;
            if ($count >= $maxSets) {
                break;
            }
        }

        foreach ($response as $tmp) {
            $tmp[0]->released = Helper::convertRelease($tmp[0]->released);
        }

        if ($count == 0) {
            $response = true;
        }

        return response()->json($response);
    }
}

class tagBags
{
    public function tagBags()
    {
        $this->tag = 0;
        $this->title = '';
        $this->userRate = 0;
        $this->sets = [];
    }
}

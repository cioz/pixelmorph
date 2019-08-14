<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class M3uController extends Controller
{
    public function index($url = false)
    {
        /*
        TODO: Fragment for API accessed through: Route::get('m3u/url/{url?}', 'M3uController@index');
        however its not used by this time and not finished
         */
        $url = URL::to('/enjoy/playlists/' . $url);
        $data = file_get_contents($url);
        $lnNumber = 0;
        $playlist = [];
        $xml = '';
        $data = substr($data, 3);
        foreach (preg_split("/((\r?\n)|(\r\n?))/", $data) as $line) {
            if ($lnNumber == 0) {
                $line = substr($line, 8);
                $line = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $line);
                $xml .= '<onetrack>' . $line . '</onetrack>';
                $lnNumber++;
            } else {
                $lnNumber = 0;
            }
        }
        $xml = '<?xml version="1.0" encoding="UTF-8"?><data>' . $xml . '</data>';
        $xml = simplexml_load_string($xml);

        return $xml;
    }

    public function batchM3u()
    {
        DB::table('playlists')->delete();
        $sets = DB::table('sets')->get();
        foreach ($sets as $set) {
            $url = substr(public_path() . '/enjoy/playlists/' . $set->filename, 0, -4);
            $url = $url . '.m3u';

            if (file_exists($url)) {
                $data = file_get_contents($url);
                $lnNumber = 0;
                $playlist = [];
                $xml = '';
                $data = substr($data, 3);
                foreach (preg_split("/((\r?\n)|(\r\n?))/", $data) as $line) {
                    if ($lnNumber == 0) {
                        $line = substr($line, 8);
                        $line = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $line);
                        $xml .= '<onetrack>' . $line . '</onetrack>';
                        $lnNumber++;
                    } else {
                        $lnNumber = 0;
                    }
                }
                $xml = '<?xml version="1.0" encoding="UTF-8"?><data>' . $xml . '</data>';
                $xml = simplexml_load_string($xml);

                $pos = 1;
                foreach ($xml as $track) {
                    if ($track->artist != '') {
                        DB::table('playlists')->insert([
                            'set_id' => $set->id,
                            'position' => $pos,
                            'artist' => $track->artist,
                            'title' => $track->title,
                        ]);
                        $pos++;
                    }
                }
            }
        }
        return (date("H:i:s") . ' batch successful!');
    }
}

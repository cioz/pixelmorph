<?php
namespace App\Http\Controllers;

use App\Pages;
use App\Persos;
use App\Skills;
use App\Skillscats;
use App\Vita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

// use App\models\Cats;
class SkillsController extends Controller
{

    public function index(Request $request, $responsive = 'desk')
    {
        $user = Auth::user();
        $desc = Pages::where('status', '1')->where('title', 'Skills')->first();
        $skillcats = Skillscats::all()->where('active', 1);
        $i = 0;

        foreach ($skillcats as $skillcat) {
            $cats[$i]['title'] = $skillcat->title;
            $skills = Skills::all()->where('skillscats_id', $skillcat->skillscats_id)->where('active', 1);
            $x = 0;
            foreach ($skills as $skill) {
                $cats[$i]['items'][$x]['id'] = $skill->id;
                $cats[$i]['items'][$x]['title'] = $skill->title;
                $cats[$i]['items'][$x]['description'] = $skill->description;
                $cats[$i]['items'][$x]['perc'] = $skill->perc;
                if ($skill->icon != '') {
                    $cats[$i]['items'][$x]['icon'] = '<i class="' . $skill->icon . ' fa-3x"></i>';
                } else if ($skill->image != '') {
                    $cats[$i]['items'][$x]['icon'] = '<img src="' . url('/') . '/images/logos/' . $skill->image . '"></img>';
                } else {
                    $cats[$i]['items'][$x]['icon'] = '';
                }
                $x++;
            }
            $i++;
        }

        if ($responsive == 'desk') {
            return view('desk.skills', [
                'responsive' => $responsive,
                'skillcats' => $cats,
                'desc' => $desc,
                'user' => $user,
            ]);
        } elseif ($responsive == 'mobile') {
            return view('mobile.skills', [
                'responsive' => $responsive,
                'skillcats' => $cats,
                'desc' => $desc,
                'user' => $user,
            ]);
        }
    }

    public function vita(Request $request, $responsive = 'desk', $pdf = false)
    {
        $user = Auth::user();
        $vitas = DB::table('vitas')->orderBy('datumstart', 'desc')->get();
        $i = 0;
        foreach ($vitas as $vita) {
            $item[$i]['title'] = $vita->title;
            $item[$i]['start'] = substr($vita->datumstart, 0, 4);
            $item[$i]['end'] = substr($vita->datumend, 0, 4);
            $item[$i]['desc'] = $vita->desc;
            $i++;
        }

        if ($pdf != false) {
            $pdf = PDF::loadView('pdf.vita', ['items' => $item]);
            return $pdf->stream('document.pdf');
        } elseif ($responsive == 'desk') {
            return view('desk.vita', [
                'responsive' => $responsive,
                'items' => $item,
                'user' => $user,
            ]);
        } elseif ($responsive == 'mobile') {
            return view('mobile.vita', [
                'responsive' => $responsive,
                'items' => $item,
                'user' => $user,
            ]);
        }
    }

    public function person(Request $request, $responsive = 'desk', $pdf = false)
    {
        $user = Auth::user();
        $items = Persos::all()->where('id', 1);

        if ($pdf != false) {
            $pdf = PDF::loadView('pdf.person', ['person' => $items]);
            return $pdf->stream('document.pdf');
        } elseif ($responsive == 'desk') {
            return view('desk.person', [
                'responsive' => $responsive,
                'items' => $items,
                'user' => $user,
            ]);
        } elseif ($responsive == 'mobile') {
            return view('mobile.person', [
                'responsive' => $responsive,
                'items' => $items,
                'user' => $user,
            ]);
        }
    }

    public function completePdf()
    {

        $person = Persos::all()->where('id', 1);

        $vitas = DB::table('vitas')->orderBy('datumstart', 'desc')->get();
        $i = 0;
        foreach ($vitas as $val) {
            $vita[$i]['title'] = $val->title;
            $vita[$i]['start'] = substr($val->datumstart, 0, 4);
            $vita[$i]['end'] = substr($val->datumend, 0, 4);
            $vita[$i]['desc'] = $val->desc;
            $i++;
        }

        $desc = Pages::where('status', '1')->where('title', 'Skills')->first();
        $skillcats = Skillscats::all()->where('active', 1);
        $i = 0;

        foreach ($skillcats as $skillcat) {
            $cats[$i]['title'] = $skillcat->title;
            $skills = Skills::all()->where('skillscats_id', $skillcat->skillscats_id)->where('active', 1);
            $x = 0;
            foreach ($skills as $skill) {
                $cats[$i]['items'][$x]['id'] = $skill->id;
                $tmp = explode(', ', $skill->title);
                $cats[$i]['items'][$x]['title'] = $tmp[0];
                $cats[$i]['items'][$x]['description'] = $skill->description;
                $cats[$i]['items'][$x]['perc'] = $skill->perc;
                if ($skill->icon != '') {
                    $cats[$i]['items'][$x]['icon'] = '<i class="' . $skill->icon . ' fa-3x"></i>';
                } else if ($skill->image != '') {
                    $cats[$i]['items'][$x]['icon'] = '<img src="' . url('/') . '/images/logos/' . $skill->image . '"></img>';
                } else {
                    $cats[$i]['items'][$x]['icon'] = '';
                }
                $x++;
            }
            $i++;
        }

        $pdf = PDF::loadView('pdf.styled', ['person' => $person, 'vita' => $vita, 'skillcats' => $cats, 'date' => date('j.n. Y')]);
        return $pdf->stream('dirk_hedtke.pdf');
    }
}

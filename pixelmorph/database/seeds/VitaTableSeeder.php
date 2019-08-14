<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VitaTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vitas')->delete();
        DB::table('vitas')->insert(array(
            0 => array(
                'title' => 'Soziales Fachabitur / Wasserburg a. Inn',
                'desc' => '',
                'datumstart' => '1991-01-01 12:00:00',
                'datumend' => '1993-12-31 12:00:00',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            1 => array(
                'title' => 'Zivildienst',
                'desc' => 'Als Krankenpfleger im Rotkreuz Krankenhaus München.',
                'datumstart' => '1994-01-01 12:00:00',
                'datumend' => '1995-12-31 12:00:00',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            2 => array(
                'title' => 'Krankenpflege Helfer',
                'desc' => 'Zu meist auf der internen Station im Kreiskrankenhaus Ebersberg und Neuperlach.',
                'datumstart' => '1996-01-01 12:00:00',
                'datumend' => '1998-12-31 12:00:00',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            3 => array(
                'title' => 'Studium Mediadesigner / Mediadesign Akademie München',
                'desc' => '4 Semster insgesamt. Malen & Zeichen, Fotografie im Anschluß Photoshop, Videoproduktion im Anschluß Premiere, Soundproduktion, Layout, Illustration im Anschluß Illustrator, 3D Design (3D Studion MAX), Quark Xpress bis Druckendstufe, HTML, Director (incl. Lingo).<br>Das Abschlussprojekt (Director/Lingo basierte Kinderlernsoftware über Strom) gewann den Jungendpreis der Multimediamesse Milia in Cannes.',
                'datumstart' => '1999-01-01 12:00:00',
                'datumend' => '2001-12-31 12:00:00',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            4 => array(
                'title' => 'Selbständigkeit Mediadesigner',
                'desc' => 'Zu der Zeit waren CD-ROMs wichtiger als das Internet. Ich entwickelt Produktpräsenationen für die Firmen <a href="https://www.binz.com" target="_blank">Binz</a>, <a href="https://www.uci-kinowelt.de" target="_blank">Kinowelt</a> und ExLibris. Das Feature war jeweils immer ein kleines integriertes Computerspiel (Director/Lingo).',
                'datumstart' => '2002-03-09 03:51:05',
                'datumend' => '2003-12-31 03:51:05',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            5 => array(
                'title' => 'Senior Online Producer / MTV Networks.',
                'desc' => 'Rechtzeitig zum .com Boom startete der gerade neu aufgestellte deutschsprachige Feed des Musiksenders MTV seine erste <a href="http://www.mtv.de" target="_blank">Webseite</a>. Ich begleitete den Online Auftritt über fünf Relaunchs. Die ersten, wie es in den 90er Jahren üblich, noch tapfer mit FTP. Der dritte bekam sein erstes PHP3 CMS, der vierte ging mit dem damals "on the edge" MVC Frameworke <a href="https://github.com/agavi/agavi" target="_blank">Agavi</a> live und gewann den <a href="https://www.grimme-online-award.de" target="_blank">Grimme Online Award</a>. Ich realisierte für namenhafte Firmen wie Mercedes, Puma, Loréa oder Karstadt deren Projekte in Kooperation mit den MTV Brand. In den letzten Jahren betreute ich die fünfköpfige Producer Redaktion. Abwechslungsreiche Projekte wie ein firmeninternes Ticketsystem oder spezielle Webauftritte der TV-Shows (großes Highlight waren natürlich immer die EMAs) versüßten den den Alltag an unserer "Wir und unser Baby" - Front.',
                'datumstart' => '2003-03-09 03:51:05',
                'datumend' => '2013-12-31 03:51:05',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            6 => array(
                'title' => 'Durch Krankheit bedingte Auszeit und anschließende Neuorientierung.',
                'desc' => '',
                'datumstart' => '2014-03-09 03:51:05',
                'datumend' => '2015-12-31 03:51:05',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            7 => array(
                'title' => 'Frontend Webentwickler / Deltatre.',
                'desc' => 'Aufbau eines neuen Feeds in Hamburg als Tochterfirma der Mutterfirma in Italien. Viel Zeit verbrachte ich mit auskundschaften von modernen Frontend Technologien und wie man sie mit dem ASP.net Backend (welches in der Firma verwendet wird) zusammen bringt. Das größte realisierte Projekt war das Frontend für die firmeninternen Software mit der Fußballdaten gepflegt und geprüft wurden. Kleinere Projekte waren z.B. das entwicklen eines Frontend welches an das <a href="https://www.deltatre.de/solutions/web-apps" traget="_blank">Live Bloggging</a> Backend für Handeslblatt und Bundesliga angebunden wurde.',
                'datumstart' => '2016-03-09 03:51:05',
                'datumend' => '2018-12-31 03:51:05',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
        ));
    }
}

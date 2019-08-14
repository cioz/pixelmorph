<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('pages')->delete();
        DB::table('pages')->insert(array(
            0 => array(
                'status' => 1,
                'author' => 1,
                'title' => 'Home',
                'headline' => 'Willkommen',
                'body' => '<p>Ein Angler braucht eine Angel, ein Schachspieler ein Schachbrett und ein Webentwickler eine Webseite. Dies ist der einzige Grund warum es diese Seite gibt ... mein Spielplatz.<br>Hast Du - warum auch immer - Bedarf an einen Internetspezialisten werfe einen Blick auf die <a href="/skills">Skills</a> und entscheide ob ich Dir behilflich sein kann. Ich helfe nicht nur aus kommerziellen Interesse. Hast Du eine Idee welche die Welt besser oder einfach nur schöner machen würden kann man mich leicht beigeistern. Ist Dir das studieren der Skills zu technisch, <a href="/kontakt">kontaktiere</a> mich einfach.</p><p>Als Freund der elektronischen Unterhaltungsmusik könnten <a href="/sound">hier</a> einige akustische Überraschungen auf dich warten. Dort findest Du einige Sets mit eleketronischer Musik verschiedenster Art. Vornehmlich Sachen zum grooven, zum entspannten Tanzen und treiben lassen oder einfach nur zum Träumen und wohl fühlen. Da ich nicht glaube das man elektronische Musik in Schubladen wie Techno oder Trance aufräumen kann, kannst Du Deine Musik durch das Einstellen von sogenannten Moods aussuchen, probier es einfach mal aus :)</p>',
                'meta_description' => 'home',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            1 => array(
                'status' => 1,
                'author' => 1,
                'title' => 'Skills',
                'headline' => 'Skills',
                'body' => '<p>In den 90er nannte man uns WebDesigner und wir mußten vom Layout bis zum Datenbankdesign irgendwie alles können.<br>Ich bezeichne mich bewußt als FrontendWebentwickler da es heute mehr Sinn macht die einzelnen Facetten im Entwicklungsprozess mit Speizalisten zu besetzen. Auch ein Frontendentwickler benötigt in diesen Tagen immer noch ein tiefes Verständnis für Programmierung und dieses bringe ich sicher mit. Mein Herz schlägt aber für Farben und Formen und wie sie erfolgreich eingesetzt werden können.<br>Ich liebe Teamarbeit wo jeder das was er am besten kann zum Ganzen beifügt, wenn jeder auch das Leid des anderen versteht und dieses sogar helfen kann zu lindern ist es perfekt. Deshalb und trotz guten Programmierkenntnissen lege ich wert auf die Bezeichnung "Frontend".</p>',
                'meta_description' => 'skills',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            2 => array(
                'status' => 1,
                'author' => 1,
                'title' => 'Login',
                'headline' => 'Login',
                'body' => '<p>Bitte einloggen ...</p>',
                'meta_description' => 'login',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            3 => array(
                'status' => 1,
                'author' => 1,
                'title' => 'Sets',
                'headline' => 'Sets',
                'body' => '<p>Das klassische Einsortieren in Genres erschien mir immer sinnlos, denn was ist schon Bassline, Trap oder wer alles weiß was Leftfield sein soll? Auch wenn ich eine genaue Vorstellung hatte was mich in dem Genre erwarten wird hat mir das nur selten weiter geholfen denn das was z.B. alles unter Techno einosrtiert wird ist meist richtig plaziert, aber die Menge von dem was dort dann alles angeboten wird war unüberschaubar.<br>Deshalb habe ich mir ein eigenes Tagging ausgedacht das sich an Stimmungen (sog. Moods) orientiert. Stelle die Regler so ein wie Deine Stimmung ist und was Du gerne hören willst. Melodiös - auf jeden Fall und bitte etwas progressiv, aber nicht zu hart ... in etwa so :)</p><br>Natürlich bewegt sich das ganze in meinem Geschmacksumfeld. Wer viel Hardbeat wählt wird schon was auf die Ohren bekommen aber das was in den üblichen Genres unter Hardstyle oder so gehandelt wird kommt bei mir sicher nicht zum vorschein. Also das System könnte trotzdem böse floppen weil ich einfach nicht der richtige DJ für Dich bin ^^.</p>',
                'meta_description' => 'sets',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            4 => array(
                'status' => 1,
                'author' => 1,
                'title' => 'Festival',
                'headline' => 'Festival',
                'body' => '<p>Imagine a festival that has everything needed to be a good one. A nice place where the music can play, toiletts and showers, garbage collecting, a place for camping, a place for cars, a place for fires, a place for food and asset stores - may be this or that nice feature like a playground or obstacles to look at.</p>
                <p>Its an electro only festival but there is one thing missing: The Djs, there is no lineup at all.</p>
                <p>There are, lets say, three stages - Mainfloor, Alternative and Chillout and its the job of the visitors to bring those stages to live. There is all they need, mixers, recievers, speakers, lights and athmospheric dancefloors. All the DJ has to bring is a pool. If he want, he can bring an own computer or a mixer.</p>
                <p>How can a DJ apply?<br>There is an App where he applies for a chosen dancefloor and he comes into a queue. The first applicant can start his session and he can play as long as his audience wants to dance to. If someone wants to kick this DJ, he places his vote with the App against this DJ. The App decides when the DJ gets booted, the next DJ in the queue can take over.<br>
                There are many more rules in mind to organise this happening but so far so good.</p>
                <p>Realising such a festival is a real big project and it can be done only with good team. This is why this text exists, i want to get people excided to participate. Everything is needed. People who know places, who can organize things, who have experience, technicians, artisans, security ...<br>The only must haves you need is a great passion to electronic music and festivals and the wish to get such a festival really happen.<br>
                At the moment iam collecting people and ideas, thats a really early state. I like festivals and iam spreading this seed onto them, interested people can make a poke on this site. Tell me if you have suggestions or if you want to participate. On the day i think its worth to take the next step i will come back to you.<br>Here are the short terms:
                    <ul>
                    <li>Electronic music festival only</li>
                    <li>No Lineup, no booked DJs</li>
                    <li>Everyone can apply to perform</li>
                    <li>The audience decides if the DJ gets booted</li>
                    <li>Its an art project not a commercial one</li>
                    <li>Its alternative orientated with a spirit like the known festival "Fusion"</li>
                    <li>Its about to make the world better not worse. Regnerative energy, no pointless garabage, no environmental destruction, rich people spend more poor people get more, no racism, no sexism, no political movements at all.</li>
                    </ul>
                    </p>',
                'meta_description' => 'festival',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
        ));
    }
}

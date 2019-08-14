@extends('layouts.master')
@section('content')

<div class="setsWrap containerContent">
<div class="filterWrap z-depth-3">
	<div class="filterSwitchWrap">
    @foreach ($tags as $key => $tag)
        <div class="tagBoxWrap">
            <div class="tagTitle">{{ $tag->title }}</div>
            <div id="tagBox{{ $tag->id }}" class="tagBox" data-id="{{ $tag->id }}"></div>
        </div>
    @endforeach
	</div>
    <div class="filterNavWrap">
        <div class="filterBtnWrap tooltipped goBtn" data-position="bottom" data-tooltip="Alle Moods eingestellt? Hier startet die Suche">
            <i class="fas fa-arrow-circle-right fa-3x icon-blue"></i>
        </div>
        <div class="filterBackBtnWrap tooltipped" data-position="bottom" data-tooltip="Versteck mich wieder">
            <i class="fas fa-arrow-circle-up fa-3x icon-blue"></i>
        </div>
        <div class="filterResetBtnWrap tooltipped" data-position="bottom" data-tooltip="Alle Moods auf Null zurück stellen">
            <i class="fas fa-arrow-circle-down fa-3x icon-blue"></i>
        </div>
    </div>
</div>
<div class="filterBack"></div>

<div class="center-align">
    <button class="btn btnSearch"><i class="fas fa-headphones"></i> FINDE MEHR MUSIK <i class="fas fa-headphones"></i></button>
    <a class="waves-effect btn modal-trigger" href="#modalhelp"><i class="fas fa-question"></i></a>
</div>

<div class="playerWrapOuter">
	<div id="player" class="playerWrap">
		<div class="titleWrap">
			<div id="track" class="playerTitle floatLeft">{{ $items[0]->title }}</div>
			<div class="playerDate floatRight">
                <div class="playerInfoWrap">
                    <div class="playerDataLength">{{ $items[0]->setlength }}</div>
                    <div class="playerDateSmall">min&nbsp;</div>
                    <div class="playerDataBpm"> {{ $items[0]->bpm }}</div>
                    <div class="playerDateSmall">BPM (&Oslash;)&nbsp;</div>
                    <div class="playerDataReleased">{{ $items[0]->released }}</div>
                </div>
				<div class="playerSocialIcons">
                    <div class="playlists">
                        <i id="openPlaylist" class="fas fa-list-ol tooltipped" data-position="bottom" data-tooltip="Playlist"></i>

                    </div>
                    <div class="playerLinks">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://pixelmorph.de/sound/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-facebook-square fa-fw playerSocialIconsPadding"></i></a>
                        <a href="https://twitter.com/home?status=https://pixelmorph.de/sound/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-twitter-square fa-fw playerSocialIconsPadding"></i></a>
                        <a href="https://plus.google.com/share?url=https://pixelmorph.de/sound/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-google-plus-square fa-fw playerSocialIconsPadding"></i></a>
                        <a href="{{ url('/') }}/enjoy/{{ $items[0]->filename }}" id="dl" data-dl="{{ $items[0]->id }}" download><i class="fas fa-download tooltipped" data-position="right" data-tooltip="Download"></i></a>
                    </div>
                </div>
			</div>
		</div>
		<div class="playerWaveWrap">
            <div class="playerPlayerWrap">
                <audio crossorigin playsinline>
                    <source src="{{ url('/') }}/enjoy/{{ $items[0]->filename }}" type="audio/mp3">
                </audio>
            </div>
		</div>
        <div class="playlist z-depth-2" id="playlistid">
            <div class="close" onclick="copyText()"><i class="copyPlaylist tooltipped fas fa-copy fa-2x" data-position="left" data-tooltip="Playlist kopieren"></i></div>
            <div class="close"><i id="closePlaylist" class="fas fa-times fa-2x"></i></div>
            <ul id="playlistUl">
            @if($items[0]->playlist != false)
                @foreach ($items[0]->playlist as $playlist)
                    <li><b>{{ $playlist->title }}</b> - {{ $playlist->artist }}</li>
                @endforeach
            @endif
            </ul>
<textarea id="playlistToCopy">
@if($items[0]->playlist != false)
@foreach ($items[0]->playlist as $playlist)
{{ $playlist->title }} - {{ $playlist->artist }}
@endforeach
@endif
</textarea>
<div class="playlistCopyHint">Playliste wurde in das Clipboard kopiert.</div>
        </div>
        <div class="playerMetaWrap">
            <div class="playerMetaCover imageRoundedBorder">
                <img id="playerCover" src="{{ url('/') }}/images/covers/{{ $items[0]->cover }}">
            </div>
            <div class="playerMetaChart">
                <canvas id="moods"></canvas>
            </div>
            <div class="playerMetaDesc">
                <div class="description">
                    {{ $items[0]->description }}
                </div>
                <div class="playerMetaLegend">
                @php
                    $i = 0;
                @endphp
                @foreach ($items[0]->label as $chartlabel)
                    <div class="playerMetaLegendItem" id="label{{ $i }}" style="background-color: ">{{ $chartlabel }}</div>
                    @php
                        $i++;
                    @endphp
                @endforeach
                </div>
            </div>
        </div>
	</div>
</div>

<div class="more">
@if ($subtitle == false)
    Neuzugänge
@endif
</div>

<div class="setsListWrap">
@if (count($items) > 1)
    @foreach ($items as $item)
        <div data-itemid="{{ $item->id }}" class="setsListItem btn waves-effect waves-light">{{ $item->title }}</div>
    @endforeach
@endif
</div>

<div id="modalhelp" class="modal">
    <div class="modal-content">
    {!! html_entity_decode($desc->body) !!}
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close btn waves-effect">Achso</a>
    </div>
</div>

<script>
var tagBox = $('.tagBox');
var slider = [], sliderValues = [], played = false;
var ChartBackgroundColor = [
    'rgba(198, 122, 85, 1)',
    'rgba(228, 143, 84, 1)',
    'rgba(245, 185, 72, 1)',
    'rgba(224, 232, 124, 1)',
    'rgba(195, 244, 130, 1)',
    'rgba(193, 213, 95, 1)',
    'rgba(151, 216, 86, 1)',
    'rgba(73, 244, 84, 1)'
];
var ChartBorderColor = [
    'rgba(54, 16, 8, 1)',
    'rgba(54, 16, 8, 1)',
    'rgba(54, 16, 8, 1)',
    'rgba(54, 16, 8, 1)',
    'rgba(54, 16, 8, 1)',
    'rgba(54, 16, 8, 1)',
    'rgba(54, 16, 8, 1)',
    'rgba(54, 16, 8, 1)'
];

var sets = {
@foreach ($items as $item)
    {{ $item->id }}:
        {
            "id": "{{ $item->id }}",
            "title": "{{ $item->title }}",
            "setlength": "{{ $item->setlength }}",
            "bpm": "{{ $item->bpm }}",
            "released": "{{ $item->released }}",
            "filename": "{{ $item->filename }}",
            "filetype": "{{ $item->filetype }}",
            "cover": "{{ $item->cover }}",
            "description": "{{ $item->description }}",
            @if ($item->playlist != false)
            "playlist": [
                @foreach ($item->playlist as $playlist)
                {
                    "title": "{{ $playlist->title }}",
                    "artist": "{{ $playlist->artist }}"
                },
                @endforeach
            ],
            @else
            "playlist": false,
            @endif
            "chartdata": [
            @foreach ($item->chart as $chart)
                {{ $chart }},
            @endforeach
            ],
            "chartlabel": [
            @foreach ($item->label as $label)
                '{{ $label }}',
            @endforeach
            ]
        },
@endforeach
}

const player = new Plyr('audio', {
    settings: ''
});
window.player = player;

$(document).ready(function() {
    registerClick({{ $items[0]->id }});
    renderChart([
        @foreach ($items[0]->chart as $chart)
            {{ $chart }},
        @endforeach
    ],
    [
        @foreach ($items[0]->label as $chartlabel)
            '{{ $chartlabel }}',
        @endforeach
    ]);
    @php
        $i = 0;
    @endphp
    @foreach ($items[0]->label as $chartlabel)
        $('#label{{ $i }}').css('background-color', ChartBackgroundColor[{{ $i }}])
        @php
            $i++;
        @endphp
    @endforeach

    tagBox.each(function (index, el) {
        var tag = {tagid: $(el).data('id'), tagvalue: parseInt(el.noUiSlider.get())};
        sliderValues.push(tag);
    });

    if ($.trim($('#playlistUl').html()) === '') {
        $('.playlists').css('display', 'none');
    }

    var animate = anime({
        targets: '#playerCover',
        borderRadius: ['100%', '0%'],
        opacity: [0, 1],
        duration: 1100,
        easing: 'easeOutQuad',
    });

    var elems, instances;
    elems = document.querySelectorAll('.tooltipped');
    instances = M.Tooltip.init(elems,{'enterDelay':'700'});
    elems = document.querySelectorAll('#modalhelp');
    instances = M.Modal.init(elems, {'startingTop':'0', 'endingTop':'1%'});
});

$('.setsListWrap').on('click', '.setsListItem', function () {
    redoPlayer( $(this).data('itemid'));
});

player.on('ready', event => {
    $('.overlay').css('display', 'none');
});

player.on('play', event => {
    if (played === false) {
        played = true;
        registerPlay($('#dl').data('dl'));
    }
});

$('.filterBtnWrap').on('click', function() {
    $('.overlay').css('display', 'block');
    var sliderValues = [];
     tagBox.each(function (index, el) {
        var tag = {tagid: $(el).data('id'), tagvalue: parseInt(el.noUiSlider.get())};
        sliderValues.push(tag);
    });
    getJSON(sliderValues);
    hideFilter();
});

$('.filterBackBtnWrap').on('click', function() {
    hideFilter();
});

$('.filterBack').on('click', function() {
    hideFilter();
});

$('#dl').on('click', function() {
    registerDl($(this).data('dl'));
});

function hideFilter() {
    var animate = anime({
        targets: '.filterWrap',
        top: -210,
        duration: 500,
        easing: 'easeInOutQuart',
    });
    $('.filterBack').css('display', 'none');
}


$('.btnSearch').on('click', function(){
    var animate = anime({
        targets: '.filterWrap',
        top: 14,
        duration: 700,
        elasticity: 600
    });
    $('.filterBack').css('display', 'block');
});


$('.filterResetBtnWrap').on('click', function() {
    tagBox.each(function (index, el) {
        el.noUiSlider.set(0);
    });
});

$('#openPlaylist').on('click', function() {
    var div = $('.playlist');
    div.css('display', 'block');
    var animate = anime({
        targets: '.playlist',
        height: '120%',
        duration: 300,
        easing: 'easeInOutQuart',
        complete: function() {
            div.css('overflow', 'auto');
        }
    });
});

$('#closePlaylist').on('click', function() {
    var div = $('.playlist');
    div.css('overflow', 'hidden');
    var animate = anime({
        targets: '.playlist',
        height: '0%',
        easing: 'easeInOutQuart',
        duration: 300,
        complete: function() {
            div.css('display', 'none');
        }
    });
});

$('.setFilter').on('click', function () {
    tagBox.each(function (index, el) {});
});

var count = 0;
tagBox.each(function (index, el) {
	id = $(el).data('id');
	slider[count] = document.getElementById('tagBox' + id);
	noUiSlider.create(slider[count], {
		start: 0,
		connect: [true, false],
		orientation: 'vertical',
		direction: 'rtl',
		step: 1,
		tooltips: [false],
		range: {
			'min': 0,
			'max': 10
		}
	});
	count++;
});


function ajaxRequest(url, filter) {
    $.ajax({
        type: 'GET',
        url: url,
        crossDomain: true,
        dataType: 'json',
        timeout: 10000,
        cache: true,
        async: true,
        success: function(data) {
            if (filter === true) {
                $('.overlay').css('display', 'none');
                doFilter(data);
            }
        },
        error: function(errorThrown) {
            console.warn('Ajax Request failed!', errorThrown, url);
        },
        complete: function() {}
    });
}

function getJSON(values) {
    var url = '{{ url('/') }}/{{ $responsive }}/api/sets/filter/';
    for (var i = 0; i < values.length; i++) {
        url += values[i].tagid + ':' + values[i].tagvalue;
        if (values.length - 1 > i) url += '-';
    }
    ajaxRequest(url, true);
}

function registerClick(id) {
    var url = '{{ url('/') }}/{{ $responsive }}/api/clicks/' + id;
    ajaxRequest(url, false);
}

function registerDl(id) {
    var url = '{{ url('/') }}/{{ $responsive }}/api/dl/' + id;
    ajaxRequest(url, false);
}

function registerPlay(id) {
    var url = '{{ url('/') }}/{{ $responsive }}/api/play/' + id;
    ajaxRequest(url, false);
}

function redoPlayer(id) {
    registerClick(id);
    player.source = {
        type: 'audio',
        sources: [
            {
                src: '{{ url('/') }}/enjoy/'+ sets[id].filename,
                type: 'audio/' + sets[id].filetype
            }]
    }
    player.autoplay = false;
    $('#playerCover').attr('src', '{{ url('/') }}/images/covers/' + sets[id].cover);
    var htmlLinks = '';
 	htmlLinks += '<a href="https://www.facebook.com/sharer/sharer.php?u=https://pixelmorph.de/sound/filter/' + id + '" target="_blank"><i class="fab fa-facebook-square fa-fw playerSocialIconsPadding"></i></a>';
	htmlLinks += '<a href="https://twitter.com/home?status=https://pixelmorph.de/sound/filter/' + id + '" target="_blank"><i class="fab fa-twitter-square fa-fw playerSocialIconsPadding"></i></a>';
	htmlLinks += '<a href="https://plus.google.com/share?url=https://pixelmorph.de/sound/filter/' + id + '" target="_blank"><i class="fab fa-google-plus-square fa-fw playerSocialIconsPadding"></i></a>';
    htmlLinks += '<a href="{{ url('/') }}/enjoy/' + sets[id].filename + '" id="dl" data-dl="' + id + '" download><i class="fas fa-download tooltipped" data-position="right" data-tooltip="Download"></i></a>';
    $('.playerLinks').html(htmlLinks);
    $('.playerTitle').html(sets[id].title);
    $('.playerDataLength').html(sets[id].setlength);
    $('.playerDataBpm').html(sets[id].bpm);
    $('.playerDataReleased').html(sets[id].released);
    $('.description').html(sets[id].description);
    $('.more').html('Weitere Ergebnisse');
    if (sets[id].playlist != false) {
        var html = ''
        var htmlHidden = '';
        for (var i=0; i<sets[id].playlist.length; i++) {
            html += '<li><b>' + sets[id].playlist[i].title + '</b> - ' + sets[id].playlist[i].artist + '</li>';
            htmlHidden += sets[id].playlist[i].title + ' - ' + sets[id].playlist[i].artist + '\n';
        }
        $('#playlistUl').html(html);
        $('#playlistToCopy').html(htmlHidden);
        $('.playlists').css('display', 'block');
    } else {
        $('.playlists').css('display', 'none');
    }
    renderChart(sets[id].chartdata, sets[id].chartlabel);
    var div = $('.playerMetaLegend');
    $(div).html('');
    for (var i = 0; i < sets[id].chartlabel.length; i++) {
        html = '<div class="playerMetaLegendItem" style="background-color: ' + ChartBackgroundColor[i] + '">' + sets[id].chartlabel[i] + '</div>';
        $(div).append(html);
    }
    var animate = anime({
        targets: '#playerCover',
        borderRadius: ['100%', '0%'],
        opacity: [0, 1],
        duration: 1100,
        easing: 'easeOutQuad',
    });
}

function doFilter(values) {
	var i, firstId = 0, html = '';
    sets = [];
    for (i=0; i<values.length; i++) {
        sets[values[i][0].id] = values[i][0];
        if (firstId === 0) {
            firstId = values[i][0].id;
        }
    }
	if (typeof values === 'undefined' || values.length === 0 || values === true) {
    	html = '<div class="noFound"><i class="icon-red floatLeft alertNoFound fas fa-frown fa-5x"></i><b>Sorry, nix gefunden :(</b><br>Versuch es noch mal. Je mehr Moods Du hinzufügst umso sicherer wird etwas gefunden. Wenn trotzdem nichts gesuchtes kommt <a href="{{ url('/') }}/{{ $responsive }}/kontakt">fordere</a> mich doch heraus ein Set mit diesen Moods zu schaffen.</div>'
	} else {
        var title = $('.playerTitle').html();
        for (i=0; i<values.length; i++) {
            if (title != values[i][0].title) {
                html += '<div data-itemid="' + values[i][0].id + '" class="setsListItem btn waves-effect waves-light">' + values[i][0].title + '</div>';
            }
        }
        redoPlayer(firstId);
	}
	$('.setsListWrap').html(html);
}

function renderChart(data, labels) {
    $('#moods').remove();
    $('.playerMetaChart').append('<canvas id="moods"></canvas>');
    ctx = document.getElementById("moods").getContext('2d');
    myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                responsive: true,
                devicePixelRatio: 1,
                maintainAspectRatio: true,
                aspectRatio: 1,
                backgroundColor: ChartBackgroundColor,
                borderColor: ChartBorderColor,
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false,
                fullWidth: false
            },
            title: {
                display: false
            },
            layout: {
                padding: 0
            },
            tooltips: {
                enabled: true,
                intersects: false
            }
        }
    });
}

function copyText() {
    $('#playlistToCopy').focus();
    $('#playlistToCopy').select();
    document.execCommand('copy');
    $('.playlistCopyHint').css('display', 'block');
        var div = $('.playlist');
    div.css('overflow', 'hidden');
    var animate = anime({
        targets: '.playlist',
        height: '0%',
        easing: 'easeInOutQuart',
        duration: 300,
        complete: function() {
            div.css('display', 'none');
        }
    });
}

</script>
@endsection

@section('nav')
    @component('components.nav', ['responsive' => $responsive, 'active' => '1', 'user' => $user])
    @endcomponent
@endsection


@extends('layouts.mobile')

@section('content')
<div class="homeText">
    <div class="visionWrap">
        <div class="valign-wrapper">
            <a class="vision" href="{{ url('/') }}/{{ $responsive }}/festival"><button class="btn btnVision">vision of a festival</button></a>
        </div>
    </div>
    <div class="homeTeaserWrap">
        <div class="homeTeaserTag"><svg class="icon40 icon-red floatLeft marginDefault"><use xlink:href="#icon-new"></use></svg>&nbsp;&nbsp;Neu - {{ $newest->released }}</div>
        <div class="homeTeaserDesc">{{ $newest->description }}</div>
        <div class="homeTeaserHead"><a href="{{ url('/') }}/{{ $responsive }}/sound/filter/{{ $newest->id }}"><div class="btn waves">{{ $newest->title }}</div></a></div>
        <div class="chartbox1"></div>
    </div>
    <div class="homeTeaserWrap">
        <div class="homeTeaserTag"><svg class="icon40 icon-red floatLeft marginDefault"><use xlink:href="#icon-promo"></use></svg>&nbsp;&nbsp;Vorgeschalgen - {{ $promo->released }}</div>
        <div class="homeTeaserDesc">{{ $promo->description }}</div>
        <div class="homeTeaserHead"><a href="{{ url('/') }}/{{ $responsive }}/sound/filter/{{ $promo->id }}"><div class="btn waves">{{ $promo->title }}</div></a></div>
        <div class="chartbox2"></div>
    </div>
    <div class="homeTeaserWrap">
        <div class="homeTeaserTag"><svg class="icon40 icon-red floatLeft marginDefault"><use xlink:href="#icon-fav"></use></svg>&nbsp;&nbsp;Beliebt - {{ $teaser->released }}</div>
        <div class="homeTeaserDesc">{{ $teaser->description }}</div>
        <div class="homeTeaserHead"><a href="{{ url('/') }}/{{ $responsive }}/sound/filter/{{ $teaser->id }}"><div class="btn waves">{{ $teaser->title }}</div></a></div>
        <div class="chartbox3"></div>
    </div>
</div>

<script>
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

var charts = [
[
@foreach ($newest->chart as $chart)
    {{ $chart }},
@endforeach
],
[
@foreach ($promo->chart as $chart)
    {{ $chart }},
@endforeach
],
[
@foreach ($teaser->chart as $chart)
    {{ $chart }},
@endforeach
]
];
var labels = [
[
@foreach ($newest->label as $label)
    '{{ $label }}',
@endforeach
],
[
@foreach ($promo->label as $label)
    '{{ $label }}',
@endforeach
],
[
@foreach ($teaser->label as $label)
    '{{ $label }}',
@endforeach
]
];

$(document).ready(function(){
@if (!empty($newest->id))
    renderChart('.chartbox1', '#canvas1', charts[0], labels[0], 'right');
@endif
@if (!empty($promo->id))
    renderChart('.chartbox2', '#canvas2', charts[1], labels[1], 'left');
@endif
@if (!empty($teaser->id))
    renderChart('.chartbox3', '#canvas3', charts[2], labels[2], 'left');
@endif
});

function spreadIt() {
    var animate = anime({
        targets: '.visionWrap',
        height: '80px',
        duration: 2000
    });
}

function renderChart(chartdiv, canvas, data, labels, position) {
    $('#moods').remove();
    $(chartdiv).append('<canvas id="' + canvas + '"></canvas>');
    ctx = document.getElementById(canvas).getContext('2d');
    myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                responsive: true,
                devicePixelRatio: 0.5,
                maintainAspectRatio: true,
                aspectRatio: 0.5,
                backgroundColor: ChartBackgroundColor,
                borderColor: ChartBorderColor,
                borderWidth: 1,
            }]
        },
        canvas: {
            style: {
                width: '2vw'
            }
        },
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true
                        }
                    }
                ]
            },
            legend: {
                display: false,
                fullWidth: false,
                position: position
            },
            title: {
                display: false
            },
            layout: {
                padding: 0
            },
            tooltips: {
                enabled: false,
                intersects: false
            },
            animation: {
                duration: 2900,
                onComplete: spreadIt()
            }
        }
    });
}
</script>
@endsection

@section('navmobile')
    @component('components.navmobile', ['responsive' => $responsive, 'active' => '1', 'user' => $user])
    @endcomponent
@endsection

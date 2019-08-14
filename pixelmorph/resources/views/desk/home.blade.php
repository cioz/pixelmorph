@extends('layouts.master')

@section('content')
<div class="homeText">
    <div class="visionWrap">
        <div class="valign-wrapper">
            <a class="vision" href="{{ url('/') }}/{{ $responsive }}/festival"><button class="btn btnVision">vision of a festival</button></a>
        </div>
    </div>
    <div class="homeTeaserWrap">
        <div class="homeTeaserTag">
            <svg class="icon40 icon-red homeIcon marginDefault"><use xlink:href="#icon-new"></use></svg>
            {{ $newest->released }}
        </div>
        <div class="homeTeaserDesc">
            <span class="homeTeaserTag">NEU</span>
            <div class="homeTeaserUrl">
                <div class="flink" data-url="{{ url('/') }}/{{ $responsive }}/sound/filter/{{ $newest->id }}"><button data-id="{{ $newest->id }}" class="click btn waves">{{ $newest->title }}</button></div>
            </div>
            {{ $newest->description }}
        </div>
        <div class="homeTeaserChart">
            <div class="chartbox1"></div>
        </div>
    </div>
    <div class="homeDivide"></div>
    <div class="homeTeaserWrap">
        <div class="homeTeaserTag">
            <svg class="icon40 icon-red homeIcon marginDefault"><use xlink:href="#icon-promo"></use></svg>
            {{ $promo->released }}
        </div>
        <div class="homeTeaserDesc">
            <span class="homeTeaserTag">VORGESTELLT</span>
            <div class="homeTeaserUrl">
                <div class="flink" data-url="{{ url('/') }}/{{ $responsive }}/sound/filter/{{ $promo->id }}"><button data-id="{{ $promo->id }}" class="click btn waves">{{ $promo->title }}</button></div>
            </div>
            {{ $promo->description }}
        </div>
        <div class="homeTeaserChart">
            <div class="chartbox2"></div>
        </div>
    </div>
    <div class="homeDivide"></div>
    <div class="homeTeaserWrap">
        <div class="homeTeaserTag">
            <svg class="icon40 icon-red homeIcon marginDefault"><use xlink:href="#icon-fav"></use></svg>
            {{ $teaser->released }}
        </div>
        <div class="homeTeaserDesc">
            <span class="homeTeaserTag">BELIEBT</span>
            <div class="homeTeaserUrl">
                <div class="flink" data-url="{{ url('/') }}/{{ $responsive }}/sound/filter/{{ $teaser->id }}"><button data-id="{{ $teaser->id }}" class="click btn waves">{{ $teaser->title }}</button></div>
            </div>
            {{ $teaser->description }}
        </div>
        <div class="homeTeaserChart">
            <div class="chartbox3"></div>
        </div>
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
    @foreach ($teaser->chart as $chart)
        {{ $chart }},
    @endforeach
],
[
    @foreach ($promo->chart as $chart)
        {{ $chart }},
    @endforeach
],
[
    @foreach ($newest->chart as $chart)
        {{ $chart }},
    @endforeach
],
];
var labels = [
    [
    @foreach ($teaser->label as $label)
        '{{ $label }}',
    @endforeach
    ],
    [
    @foreach ($promo->label as $label)
        '{{ $label }}',
    @endforeach
    ],
    [
    @foreach ($newest->label as $label)
        '{{ $label }}',
    @endforeach
    ],
];

$(document).ready(function(){
@if (!empty($teaser->id))
    renderChart('.chartbox1', '#canvas1', charts[2], labels[2], 'right');
@endif
@if (!empty($promo->id))
    renderChart('.chartbox2', '#canvas2', charts[1], labels[1], 'left');
@endif
@if (!empty($newest->id))
    renderChart('.chartbox3', '#canvas3', charts[0], labels[0], 'left');
@endif
});

function spreadIt() {
    var animate = anime({
        targets: '.visionWrap',
        height: '150px',
        duration: 2000
    });
}

function renderChart(chartdiv, canvas, data, labels, position) {
    $('#moods').remove();
    $(chartdiv).append('<canvas id="' + canvas + '"></canvas>');
    ctx = document.getElementById(canvas).getContext('2d');
    myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                responsive: true,
                devicePixelRatio: 0.5,
                maintainAspectRatio: false,
                aspectRatio: 0.5,
                backgroundColor: ChartBackgroundColor,
                borderColor: ChartBorderColor,
                borderWidth: 1,
            }]
        },
        options: {
            legend: {
                display: true,
                fullWidth: false,
                position: 'left',
                labels: {
                    fontSize: 11,
                    boxWidth: 12
                }
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

@section('nav')
    @component('components.nav', ['responsive' => $responsive, 'active' => '1', 'user' => $user])
    @endcomponent
@endsection

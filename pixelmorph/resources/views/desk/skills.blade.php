@extends('layouts.master')
@section('content')
@if ($user)
    @component('components.navskills', ['responsive' => $responsive, 'active' => 'skills'])
    @endcomponent
@endif

<div class="containerContent">
	{!! $desc->body !!}
    @if ($user)
    <p>
    Der Quellcode dieser Seite läßt sich hier einsehen:<br><a href="https://github.com/scoop2/pixel" target="_blank">https://github.com/scoop2/pixel</a>
    </p>
    @endif
    <div class="skill-cat-head">Die Wertung erklärt</div>
    <div class="skillLegendWrap">
        <div class="skillLegendItemWrap">
            <div class="skillLegendCircle">
                <svg viewBox="0 0 37 37" class="circular-chart">
                <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                <path class="circle" stroke-dasharray="100, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                <text x="18" y="20.35" class="percentage">100%</text>
                </svg>
            </div>
            <div class="skillLegendText">
                Das Thema esse ich zum Frühstück, streng dich an wenn du mir was Neues erzählen willst.
            </div>
        </diV>
        <div class="skillLegendItemWrap">
            <div class="skillLegendCircle">
                <svg viewBox="0 0 37 37" class="circular-chart">
                <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                <path class="circle" stroke-dasharray="80, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                <text x="18" y="20.35" class="percentage">80%</text>
                </svg>
            </div>
            <div class="skillLegendText">
                Ich bin routiniert und muss nur in schwierigen Fällen weitere Hilfen bemühen.
            </div>
        </diV>
        <div class="skillLegendItemWrap">
            <div class="skillLegendCircle">
                <svg viewBox="0 0 37 37" class="circular-chart">
                <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                <path class="circle" stroke-dasharray="60, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                <text x="18" y="20.35" class="percentage">60%</text>
                </svg>
            </div>
            <div class="skillLegendText">
                Ich habe mit diesem Thema genug Erfahrung um den Alltag zu bestreiten, will aber noch hinzu lernen und besser werden.
            </div>
        </diV>
        <div class="skillLegendItemWrap">
            <div class="skillLegendCircle">
                <svg viewBox="0 0 37 37" class="circular-chart">
                <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                <path class="circle" stroke-dasharray="40, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                <text x="18" y="20.35" class="percentage">40%</text>
                </svg>
            </div>
            <div class="skillLegendText">
                Ich beherrsche das Thema nur in den Bereichen die ich bisher benötigt habe.
            </div>
        </diV>
    </div>
	<ul>
		@foreach ($skillcats as $cat)
        @isset ($cat['items'])
		<li>
			<div class="skill-cat-head">{{ $cat['title'] }}</div>
			@foreach ($cat['items'] as $item)
                <div class="skillItemWrap">
                <div class="skillItemIcon">{!! $item['icon'] !!}</div>
                <div class="skillItemCircle">
                    <svg viewBox="0 0 37 37" class="circular-chart">
                    <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                    <path class="circle" stroke-dasharray="{!! $item['perc'] !!}, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                    <text x="18" y="20.35" class="percentage">{!! $item['perc'] !!}%</text>
                    </svg>
                </div>
                <div class="skillItemText">
                    <b>{!! $item['title'] !!}</b><br>
                    {!! $item['description'] !!}
                </div>
                </diV>
            @endforeach
		</li>
        @endisset
        @endforeach
	</ul>
</div>
<script>
$(document).ready(function(){
    $('.circle').css('animation', 'progress 1s ease-out forwards');
    $(".skillItemText").mouseenter(function(e) {
        e.stopPropagation();
        var el = $(this).prev();
        var html = $(this).prev().html();
        el.html('');
        el.html(html);
    });
});
</script>
@endsection

@section('nav')
    @component('components.nav', ['responsive' => $responsive, 'user' => $user])
    @endcomponent
@endsection

@extends('layouts.mobile')
@section('content')
@if ($user === true)
    @component('components.navskills', ['responsive' => $responsive, 'active' => 'skills'])
    @endcomponent
@endif
<div class="containerContent">
	{!! $desc->body !!}
</div>
<ul>
    @php
        $i = 1;
    @endphp
    @foreach ($skillcats as $cat)
    @isset ($cat['items'])
    <li>
        <div class="skill-cat-head">{{ $cat['title'] }}</div>
        @foreach ($cat['items'] as $item)
        @php
        if ($i == 0) {
            $style = ' skillColored';
            $i++;
        } else {
            $style = '';
            $i = 0;
        }
        @endphp
        <div id="skillItem{{ $item['id'] }}" class="skillItemWrap{{ $style }}">
            <div class="skillLeftWrap">
                <div class="skillItemIcon">{!! $item['icon'] !!}</div>
                <div class="skillItemCircle">
                    <svg viewBox="0 0 37 37" class="circular-chart">
                    <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                    <path class="circle" stroke-dasharray="{!! $item['perc'] !!}, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                    <text x="18" y="20.35" class="percentage">{!! $item['perc'] !!}%</text>
                    </svg>
                </div>
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

<script>
$(document).ready(function(){
    $('.circle').css('animation', 'progress 1s ease-out forwards');
});

$(window).scroll(function(){
@foreach ($skillcats as $cat)
@isset ($cat['items'])
    @foreach ($cat['items'] as $item)
    if ($('#skillItem{{ $item['id'] }}').visible()) {
        var elem = $('#skillItem{{ $item['id'] }}');
        var el = elem.prev();
        var html = elem.prev().html();
        el.html('');
        el.html(html);
    }
    @endforeach
@endisset
@endforeach
});

</script>
@endsection

@section('navmobile')
    @component('components.navmobile', ['responsive' => $responsive, 'user' => $user])
    @endcomponent
@endsection

<style>
body {
    font-family: Helvetica, sans-serif;
    font-size: 12px;
}
body a {
    color: black;
}

.page-break {
    page-break-after: always;
}
</style>

<table width="100%">
    <tr>
        <td class="person">{!! $person[0]->name !!} / Frontend Webentwickler<br>{!! $person[0]->adress !!}</td>
        <td class="person">{!! $person[0]->geb !!}<br>{!! $person[0]->state !!}<br>{!! $person[0]->family !!} / {!! $person[0]->rel !!}</td>
    </tr>
    <tr>
        <td class="person">{!! $person[0]->tele !!}</td>
        <td class="person">{!! $person[0]->lang !!}</td>
    </tr>
    <tr>
        <td class="person" colspan="2"><a href="mailto:{!! $person[0]->email !!}">{!! $person[0]->email !!}</a></td>
    </tr>
    <tr>
        <td class="person" colspan="2">{!! $person[0]->driver !!}</td>
    </tr>
    <tr>

    </tr>
</table>

<h1>Vita</h1>
@foreach ($vita as $val)
        <b>{{ $val['start'] }} - {{ $val['end'] }}</b> {{ $val['title'] }}
        <br>
        <p>
        {!! $val['desc'] !!}
        </p>
        <hr>
@endforeach
<div class="page-break"></div>


<h1>Skills</h1>
@foreach ($skillcats as $cat)

@isset ($cat['items'])
    @if ($cat['title']  == 'Backend Frameworks')
        <div class="page-break"></div>
    @endif
    	<h2>{{ $cat['title'] }}</h2>
    @foreach ($cat['items'] as $item)

    @if ($item['title']  == 'Ember')
        <div class="page-break"></div>
    @endif
    <b>{!! $item['title'] !!}<b><br>
    <p>
        {!! $item['description'] !!}
    </p>
    @endforeach
@endisset
@endforeach


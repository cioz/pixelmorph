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
        <td class="person">{!! $person[0]->name !!}<br>{!! $person[0]->adress !!}</td>
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

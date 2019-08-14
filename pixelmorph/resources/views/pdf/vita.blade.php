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

<div class="containerContent">
<h4>Vita, Dirk Hedtke</h4>
@foreach ($items as $item)

        <h5><b>{{ $item['start'] }} - {{ $item['end'] }}</b></h5>
        <p>
        <b>{{ $item['title'] }}</b>
        <br>
        {!! $item['desc'] !!}
        </p>
        <hr>
@endforeach
</div>

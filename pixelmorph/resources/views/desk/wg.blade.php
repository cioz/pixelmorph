@extends('layouts.master')

@section('content')

<div class="containerContent">
    <p>
        <img class="floatRight" src="{{ url('/') }}/images/portrait_sempa.png">
        <h2>Ein Hallo an die WG</h2>
        @php
            echo nl2br($content[0]->content);
        @endphp
    </p>
</div>

@endsection

@section('nav')
    @component('components.nav', ['responsive' => $responsive, 'active' => '1', 'user' => $user])
    @endcomponent
@endsection

@extends('layouts.mobile')

@section('content')
<div class="containerContent">
    <p>
        <img class="floatRight" src="{{ url('/') }}/images/portrait_mobile_sempa.png">
        <h1>Ein Hallo an die WG</h1>
        {!! $content[0]->content !!}
    </p>
</div>

@endsection

@section('navmobile')
    @component('components.navmobile', ['responsive' => $responsive, 'active' => '1', 'user' => $user])
    @endcomponent
@endsection

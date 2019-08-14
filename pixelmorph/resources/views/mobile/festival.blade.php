@extends('layouts.mobile')
@section('content')

<div class="containerContent festivalContent">
    {!! $item[0]->body !!}
    <a href="{{ url('/') }}/{{ $responsive }}/kontakt"><button class="btn waves centered">I want to get in touch!</button></a>
</div>

@endsection
@section('navmobile')
    @component('components.navmobile', ['responsive' => $responsive, 'user' => $user])
    @endcomponent
@endsection

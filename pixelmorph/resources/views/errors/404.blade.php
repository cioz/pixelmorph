@extends('layouts.master') @section('content')
<div class="containerContent">
	<div class="contentCentered realBigText">404</div>
</div>
@endsection
@section('nav')
    @component('components.nav', ['responsive' => 'desk', 'user' => 'Gast'])
    @endcomponent
@endsection

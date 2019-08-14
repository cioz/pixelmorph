@extends('layouts.master')

@section('content')
<div class="contentConatiner">
test
</div>
@endsection

@section('navmobile')
    @component('components.navmobile', ['active' => '1', 'user' => 'sepp'])
    @endcomponent
@endsection

@extends('layouts.admin')

@section('content')
@component('components.navadmin', ['active' => 'index'])
@endcomponent
<div class="containerContent">

  <ul class="collapsible">
  @foreach ($pages as $page)
    <li>
    <div class="collapsible-header">{{ $page->title }}</div>
    <div class="collapsible-body">
    <form action="{{ url('/admin') }}" method="POST" class="col s12">
        <div class="row">
            <div class="input-field col s12">
                <input id="title" name="title" value="{{ $page->title }}" type="text">
                <label for="title">Title</label>
            </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea2" name="text" class="materialize-textarea" data-length="120">{{ $page->body }}</textarea>
            <label for="textarea2"></label>
          </div>
        </div>
        <input type="hidden" name="id" value="{{ $page->id }}">
        <input type="submit" value="Abschicken" class="btnSubmit btn">
        {{ csrf_field() }}
    </form>
    </div>
    </li>
@endforeach
  </ul>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
});
</script>

</div>
@endsection
@section('nav')
    @component('components.navadminbottom', ['user' => $user, 'responsive' => 'desk'])
    @endcomponent
@endsection

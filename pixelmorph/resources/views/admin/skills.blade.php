@extends('layouts.admin')

@section('content')
@component('components.navadmin', ['active' => 'skills'])
@endcomponent
<div class="containerContent">

  <ul class="collapsible">
  @foreach ($skills as $skill)
    <li>
    <div class="collapsible-header">{{ $skill->title }}</div>
    <div class="collapsible-body">
    <form action="{{ url('/admin/skills') }}" method="POST" class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <input id="title" name="title" value="{{ $skill->title }}" type="text">
                <label for="title">Title</label>
            </div>
            <div class="input-field col s6">
                <input id="perc" name="perc" value="{{ $skill->perc }}" type="text">
                <label for="perc">Prozent</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="icon" name="icon" value="{{ $skill->icon }}" type="text">
                <label for="icon">Icon</label>
            </div>
            <div class="input-field col s6">
                <input id="image" name="image" value="{{ $skill->image }}" type="text">
                <label for="image">Iamge</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="skillscat">
                @foreach ($cats as $cat)
                    @if ($skill->skillscats_id == $cat->id)
                        @php
                            $selected = ' selected';
                        @endphp
                    @else
                        @php
                            $selected = '';
                        @endphp
                    @endif
                    <option value="{{ $cat->id}}"{{ $selected }}>{{ $cat->title }}</option>
                @endforeach
                </select>
                <label>Kategorie</label>
            </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea2" name="text" class="materialize-textarea" data-length="120">{{ $skill->description }}</textarea>
            <label for="textarea2"></label>
          </div>
        </div>
        <input type="hidden" name="id" value="{{ $skill->id }}">
        <input type="submit" value="Abschicken" class="btnSubmit btn">
        {{ csrf_field() }}
    </form>
    </div>
    </li>
@endforeach
  </ul>
  <pre>

</pre>
<script>


/*
$('.btnSubmit').on('click', function(e){
console.log(e)
$("form").submit(function(){
        alert("Submitted");
    });
});
*/

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });
</script>

</div>
@endsection
@section('nav')
    @component('components.navadminbottom', ['user' => $user])
    @endcomponent
@endsection

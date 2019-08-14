@extends('layouts.admin')

@section('content')
@component('components.navadmin', ['active' => 'sound'])
@endcomponent

<div class="containerContent">

@if (isset($msg))
<div class="row">
    <div class="col s12">
        <div class="card {{ $modalclass }}">
            <div class="card-content white-text">
                <p>{!! $msg !!}</p>
            </div>
        </div>
    </div>
</div>
@endif

<ul class="collapsible">
    <li>
    <div class="collapsible-header">Create New Set</div>
    <div class="collapsible-body">
    <form action="{{ url('/admin/sound/insert') }}" method="POST" class="col s12">
        <div class="row">
            <div class="input-field col s8">
                <input name="title" value="" type="text">
                <label for="title">Title</label>
            </div>
            <div class="input-field col s2">
                <input name="setlength" value="0" type="text">
                <label for="setlength">Länge</label>
            </div>
            <div class="input-field col s2">
                <input name="bpm" value="0" type="text">
                <label for="bpm">BPM</label>
            </div>
        </div>
        <div class="row">
            <div class="switch col s4">
                <b>Promo</b><br>
                <label>
                Off
                <input name="promo" type="checkbox">
                <span class="lever"></span>
                On
                </label>
            </div>
            <div class="switch col s4">
                <b>Aktiv</b><br>
                <label>
                Off
                <input name="active" type="checkbox" checked>
                <span class="lever"></span>
                On
                </label>
            </div>
            <div class="input-field col s4">
                <input name="released" value="2018-03-09 03:51:05" type="text">
                <label for="released">Release</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s10">
                <input name="filename" value="" type="text">
                <label for="icon">Filename</label>
            </div>
            <div class="input-field col s2">
                <input name="filetype" value="" type="text">
                <label for="filetype">Filetype</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <textarea name="description" class="materialize-textarea" data-length="120"></textarea>
                <label for="textarea">Beschreibung</label>
            </div>
            <div class="input-field col s4">
                 <input name="cover" type="text">
                <label for="textarea">Cover</label>
            </div>
        </div>
        <div class="row tagstore">
        <div class="input-field col s3">
            <select name="newtag">
                <option value"newtag" selected>new</option>
                @foreach ($alltags as $settag)
                <option value="{{ $settag->id }}">{{ $settag->title }}</option>
                @endforeach
            </select>
            <select name="newrate">
            <option value="1" selected>1</option>
            @for ($y= 2; $y < 11; $y++ )
                <option value="{{ $y }}">{{ $y }}</option>
            @endfor
            </select>
        </div>
        </div>
        <input type="hidden" name="id" value="new">
        <input type="submit" value="Abschicken" class="btnSubmit btn">
        {{ csrf_field() }}
    </form>
    </div>
    </li>
@foreach ($sets as $set)
    <li>
    @if ($set->promo == 1)
        @php
            $promo = '<i class="fas fa-bell fa-xs"></i>';
        @endphp
    @else
        @php
            $promo = '';
        @endphp
    @endif
    <div class="collapsible-header">{!! $promo !!}{{ $set->title }}</div>
    <div class="collapsible-body">
    <form action="{{ url('/admin/sound') }}" method="POST" class="col s12">
        <div class="row">
            <div class="input-field col s8">
                <input name="title" value="{{ $set->title }}" type="text">
                <label for="title">Title</label>
            </div>
            <div class="input-field col s2">
                <input name="setlength" value="{{ $set->setlength }}" type="text">
                <label for="setlength">Länge</label>
            </div>
            <div class="input-field col s2">
                <input name="bpm" value="{{ $set->bpm }}" type="text">
                <label for="bpm">BPM</label>
            </div>
        </div>
        <div class="row">
            <div class="switch col s4">
                <b>Promo</b><br>
                <label>
                Off
                @if ($set->promo == 1)
                    @php
                        $checked = ' checked';
                    @endphp
                @else
                    @php
                        $checked = '';
                    @endphp
                @endif
                <input name="promo" type="checkbox"{{ $checked }}>
                <span class="lever"></span>
                On
                </label>
            </div>
            <div class="switch col s4">
                <b>Aktiv</b><br>
                <label>
                Off
                @if ($set->active == 1)
                    @php
                        $checked = ' checked';
                    @endphp
                @else
                    @php
                        $checked = '';
                    @endphp
                @endif
                <input name="active" type="checkbox"{{ $checked }}>
                <span class="lever"></span>
                On
                </label>
            </div>
            <div class="input-field col s4">
                <input name="released" value="{{ $set->released }}" type="text">
                <label for="released">Release</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s10">
                <input name="filename" value="{{ $set->filename }}" type="text">
                <label for="icon">Filename</label>
            </div>
            <div class="input-field col s2">
                <input name="filetype" value="{{ $set->filetype }}" type="text">
                <label for="filetype">Filetype</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <textarea name="description" class="materialize-textarea" data-length="120">{{ $set->description }}</textarea>
                <label for="textarea">Beschreibung</label>
            </div>
            <div class="input-field col s4">
                 <input name="cover" value="{{ $set->cover }}" type="text">
                <label for="textarea">Cover</label>
            </div>
        </div>
        <div class="row tagstore">
        @foreach ($set->tagbag as $tagbag)
        <div class="input-field col s3">
            <select name="settag[]">
                @foreach ($alltags as $settag)
                    @if ($tagbag->tagid == $settag->id)
                        @php
                            $selected = ' selected';
                        @endphp
                    @else
                        @php
                            $selected = '';
                        @endphp
                    @endif
                <option value="{{ $settag->id }}"{{ $selected }}>{{ $settag->title }}</option>
                @endforeach
                <option value="delete">DELETE</option>
            </select>
            <select name="rate[]">
            @for ($y= 1; $y < 11; $y++ )
                @if ($y == $tagbag->tagrate)
                    @php
                        $selected = ' selected';
                    @endphp
                @else
                    @php
                        $selected = '';
                    @endphp
                @endif
                <option value="{{ $y }}"{{ $selected }}>{{ $y }}</option>
            @endfor
            </select>
        </div>
        @endforeach
        <div class="input-field col s3">
            <select name="newtag">
                <option value="newtag" selected>new</option>
                @foreach ($alltags as $settag)
                <option value="{{ $settag->id }}">{{ $settag->title }}</option>
                @endforeach
            </select>
            <select name="newrate">
            <option value="1" selected>1</option>
            @for ($y= 2; $y < 11; $y++ )
                <option value="{{ $y }}">{{ $y }}</option>
            @endfor
            </select>
        </div>
        </div>
        <div class="row">
            <div class="col s12">
                <input type="submit" value="Abschicken" class="btnSubmit btn">
                <a href="{{ url('/admin/sound/delete/'.$set->id) }}"><div class="btnDelete btn modal-trigger right">Löschen</div></a>
            </div>
        </div>
        <input type="hidden" name="id" value="{{ $set->id }}">
        {{ csrf_field() }}
    </form>
    </div>
    </li>
@endforeach
</ul>
<script>

/*
$('#addTag').on('click', function(e){
    var html = '<select>' +
    @foreach ($alltags[0] as $settag)
       '<option value="">{{ $settag }}</option>' +
    @endforeach
    '</select>';
});
*/
$('.btnDelete').on('click', function(e){
    window.location.replace("{{ url('/admin/sound/delete/') }}" + '/' + $(this).data('deleteid'));
});

document.addEventListener('DOMContentLoaded', function() {
    var elems, instances;
    elems = document.querySelectorAll('.collapsible');
    instances = M.Collapsible.init(elems);
    elems = document.querySelectorAll('select');
    instances = M.FormSelect.init(elems);
});

</script>

</div>
@endsection

@section('nav')
    @component('components.navadminbottom', ['active' => '1', 'user' => $user])
    @endcomponent
@endsection

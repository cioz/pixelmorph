@extends('layouts.admin')

@section('content')
@component('components.navadmin', ['active' => 'wg'])
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
        <div class="collapsible-header"><b>neues Anschreiben</b></div>
        <div class="collapsible-body">
        <form action="{{ url('/admin/wg/insert') }}" method="POST" class="col s12">
            <div class="row">
                <div class="input-field col s3">
                    <input id="title" name="title" type="text">
                    <label for="title">Title</label>
                </div>
                <div class="input-field col s3">
                    <input id="url" name="url" type="text" value="{{ $newurl }}">
                    <label for="url">Url</label>
                </div>
                <div class="input-field col s3">
                    <input id="email" name="email" type="text">
                    <label for="url">Email</label>
                </div>
                <div class="switch col s3">
                    <b>Aktiv</b><br>
                    <label>
                    Off
                    <input name="active" type="checkbox" checked>
                    <span class="lever"></span>
                    On
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <select id="template" name="template">
                        <option value"template" selected disabled>wähle</option>
                        @foreach ($itemstext as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field col s8">
                    <input id="referenz" name="referenz" type="text">
                    <label for="url">Referenz</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <textarea id="newcontent" name="content" class="materialize-textarea" data-length="120"></textarea>
                <label for="content"></label>
                </div>
            </row>
            <input type="submit" value="Abschicken" class="btnSubmit btn">
            {{ csrf_field() }}
        </form>
        </div>
    </li>
    @foreach ($items as $item)
    <li>
    <div class="collapsible-header">{{ $item->title }}</div>
    <div class="collapsible-body">
    <form action="{{ url('/admin/wg') }}" method="POST" class="col s12">
        <div class="row">
            <div class="input-field col s3">
                <input id="title" name="title" value="{{ $item->title }}" type="text">
                <label for="title">Title</label>
            </div>
            <div class="input-field col s3">
                <input id="url" name="url" value="{{ $item->url }}" type="text">
                <label for="url">Title</label>
            </div>
            <div class="input-field col s3">
                <input id="email" name="email" value="{{ $item->email }}" type="text">
                <label for="email">Email</label>
            </div>
            <div class="switch col s3">
                <b>Aktiv</b><br>
                <label>
                Off
                @if ($item->active == 1)
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
            <div class="input-field col s8">
                <input id="referenz" name="referenz" value="{{ $item->referenz }}" type="text">
                <label for="url">Referenz</label>
                <a href="{{ $item->referenz }}" target="_blank">{{ $item->referenz }}</a>
            </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea name="content" class="materialize-textarea" data-length="120">{{ $item->content }}</textarea>
            <label for="content"></label>
          </div>
        </div>
        <div class="row">
            <div class="col s3">
                <input type="submit" value="Speichern" class="btnSubmit btn">
            </div>
            <div class="col s3"></div>
            <div class="col s3">
                <a href="{{ url('/admin/wg/delete/'.$item->id) }}"><div class="btnDelete btn modal-trigger">Löschen</div></a>
            </div>
            <div class="col s3">
                <a href="{{ url('/admin/wg/send/'.$item->id) }}"><div class="btnAgree btn modal-trigger">Versenden</div></a>
            </div>
        </div>
        <input type="hidden" name="id" value="{{ $item->id }}">
        {{ csrf_field() }}
    </form>
    </div>
    </li>
    @endforeach
</ul>

<ul class="collapsible">
    <li>
        <div class="collapsible-header"><b>neue Vorlage</b></div>
        <div class="collapsible-body">
        <form action="{{ url('/admin/wg/insert/text') }}" method="POST" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input id="title" name="title" type="text">
                    <label for="title">Title</label>
                </div>
                <div class="switch col s6">
                    <b>Aktiv</b><br>
                    <label>
                    Off
                    <input name="active" type="checkbox" checked>
                    <span class="lever"></span>
                    On
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <textarea name="content" class="materialize-textarea" data-length="120"></textarea>
                <label for="content"></label>
                </div>
            </row>
            <input type="submit" value="Abschicken" class="btnSubmit btn">
            {{ csrf_field() }}
        </form>
        </div>
    </li>
    @foreach ($itemstext as $item)
    <li>
    <div class="collapsible-header">{{ $item->title }}</div>
    <div class="collapsible-body">
    <form action="{{ url('/admin/wg/text') }}" method="POST" class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <input id="title" name="title" value="{{ $item->title }}" type="text">
                <label for="title">Title</label>
            </div>
            <div class="switch col s6">
                <b>Aktiv</b><br>
                <label>
                Off
                @if ($item->active == 1)
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
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea name="content" class="materialize-textarea" data-length="120">{{ $item->content }}</textarea>
            <label for="content"></label>
          </div>
        </div>
        <input type="hidden" name="id" value="{{ $item->id }}">
        <input type="submit" value="Abschicken" class="btnSubmit btn">
        <a href="{{ url('/admin/wg/delete/text/'.$item->id) }}"><div class="btnDelete btn modal-trigger right">Löschen</div></a>
        {{ csrf_field() }}
    </form>
    </div>
    </li>
    @endforeach
</ul>

<script>
    $('#template').on('change', function() {
        $('#newcontent').val(vorlagen[$("#template" ).val()]);
    });

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.collapsible');
        var instances = M.Collapsible.init(elems);
        elems = document.querySelectorAll('select');
        instances = M.FormSelect.init(elems);
    });

    var vorlagen = {
    @foreach ($itemstext as $item)
        @php
            $tmp = json_encode($item->content);
        @endphp
        "{{ $item->id}}": "{{ $tmp }}",
    @endforeach
    }
</script>

</div>
@endsection
@section('nav')
    @component('components.navadminbottom', ['user' => $user, 'responsive' => 'desk'])
    @endcomponent
@endsection

@extends('layouts.mobile')
@section('content')
<div class="containerContent">
	<h1>Kontakt</h1>
    @if ($message != false)
    <div class="card">
        <div class="card-content">
            <h3>Vielen Dank</h3>
            <p>Die Nachricht wurde versendet.</p>
        </div>
    </div>
    @endif

    <form method="post" action="">
    <div class="row">
        <div class="input-field col s6">
            <input id="username" name="user" type="text">
            <label for="username">Dein Name</label>
        </div>
        <div class="input-field col s6">
            <input id="email" name="email" type="text">
            <label for="email">Deine Email</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
        <select name="woher">
            <option value="1">noch gar nicht oder egal</option>
            <option value="1">beruflich</option>
            <option value="1">Berlin</option>
            <option value="2">Hamburg</option>
            <option value="2">München</option>
            <option value="3">Ozzora</option>
            <option value="3">Meeresrausch</option>
            <option value="3">Fusion</option>
            <option value="3">Bucht der Träumer</option>
        </select>
        <label>Woher kennen wir uns?</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <textarea name="text" id="textarea1" class="materialize-textarea"></textarea>
            <label for="textarea1">Dein Text</label>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <button class="btn floatRight">Abschicken</button>
        </div>
    </div>
    <form/>
</div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
@endsection

@section('navmobile')
    @component('components.navmobile', ['responsive' => $responsive, 'active' => '1', 'user' => $user])
    @endcomponent
@endsection

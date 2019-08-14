<div class="nav_skills_wrap z-depth-1">
<div>
    <a href="{{ url('/') }}/{{ $responsive }}/blog/neu"><i class="fas fa-plus-square fa-4x btnNeu"></i></a>
    </div>
    <div>
    <form method="POST" action="{{ url('/') }}/{{ $responsive }}/blog/suche">
            <div class="input-field" style="width: 100%;">
                <input id="icon_prefix" type="text">
                <label for="icon_prefix">Suchen</label>
            </div>
    </form>
    </div>
    <div>
    <input type="text" class="datepicker">
    </div>
</div>


@if ($active == 'skills')
    @php
        $skills = 'nav_item_active';
    @endphp
@else
    @php
        $skills = 'nav_item';
    @endphp
@endif
@if ($active == 'vita')
    @php
        $vita = 'nav_item_active';
    @endphp
@else
    @php
        $vita = 'nav_item';
    @endphp
@endif
@if ($active == 'person')
    @php
        $person = 'nav_item_active';
    @endphp
@else
    @php
        $person = 'nav_item';
    @endphp
@endif
<div class="nav_skills_wrap z-depth-1">
    <div class="nav_item {{ $skills }}"><a href="{{ url('/') }}/{{ $responsive }}/skills">Skills</a></div>
    <div class="nav_item {{ $vita }}"><a href="{{ url('/') }}/{{ $responsive }}/skills/vita">Vita</a></div>
    <div class="nav_item {{ $person }}"><a href="{{ url('/') }}/{{ $responsive }}/skills/person">Personalien</a></div>
    <div class="nav_item nav_pdf"><a href="{{ url('/') }}/{{ $responsive }}/skills/pdf" target="_blank"><i class="fas fa-sm fa-file-pdf"></i></a></div>
</div>

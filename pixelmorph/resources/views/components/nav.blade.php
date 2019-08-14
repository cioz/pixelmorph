<div class="nav-wrap">
	<div class="nav-line-wrap">
		<div class="containerShape">
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
			<div class="shape"></div>
	</div>
	</div>

	<div class="nav-line-wrap">
		<div class="stripe-left"></div>
		<div class="nav-headline">
			<span class="nav-headlineTypo">PIXELMORPH</span>
		</div>
		<div class="stripe-right"></div>
	</div>

<div class="nav-line-wrap">
	<div class="nav-space"></div>
	<div class="nav-space-mid"></div>
	<div class="nav-space"></div>
</div>


<div class="menu-wrap">
	<div class="nav-left-stripe"></div>
	<nav>
		<div class="nav-menuItem flink" id="mHome" data-url="{{ url('/') }}/{{ $responsive }}/home">Home</div>
		<div class="nav-menuItem flink" id="mSkills" data-url="{{ url('/') }}/{{ $responsive }}/skills">Skills</div>
		<div class="nav-menuItem flink" id="mSets" data-url="{{ url('/') }}/{{ $responsive }}/sound">Musik</div>
		<div class="nav-menuItem flink" id="mKontakt" data-url="{{ url('/') }}/{{ $responsive }}/kontakt">Kontakt</div>
	<div id="menu-hover" class="animation"></div>
	</nav>
	<div class="nav-right-stripe">
@if ($user != false)
        <a href="{{ url('/') }}/logout"><div class="nav_user_icon"><i class="fas fa-sign-out-alt fa-lg"></i></div></a>
@endif
@if (isset($user->superuser))
@if ($user->superuser == 1)
        <a href="{{ url('/') }}/admin"><div class="nav_user_icon"><i class="fas fa-edit fa-lg"></i></div></a>
@endif
@endif
    </div>
</div>

</div>

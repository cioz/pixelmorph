<div class="nav-wrap">
	<div class="nav-line-wrap">
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
		<a class="nav-menuItem" id="mHome" href="{{ url('/') }}/desk/home">Home</a>
		<a class="nav-menuItem" id="mSkills" href="{{ url('/') }}/desk/skills">Skills</a>
		<a class="nav-menuItem" id="mSets" href="{{ url('/') }}/desk/sound">Musik</a>
		<a class="nav-menuItem" id="mKontakt" href="{{ url('/') }}/desk/kontakt">Kontakt</a>
	<div id="menu-hover" class="animation"></div>
	</nav>
	<div class="nav-right-stripe">
@if ($user != false)
        <a href="{{ url('/') }}/logout"><div class="nav_user_icon"><i class="fas fa-sign-out-alt fa-lg"></i></div></a>
@endif
    </div>
</div>

</div>

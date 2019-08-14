<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<meta name="description" content="Pixelmorph"/>
<meta name="keywords" content="Pixelmorph"/>
<link rel="apple-touch-icon" sizes="180x180" href="{{ url('/') }}/images/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="{{ url('/') }}/images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/images/favicon/favicon-16x16.png">
<link rel="manifest" href="{{ url('/') }}/images/favicon/site.webmanifest">
<link rel="mask-icon" href="{{ url('/') }}/images/favicon/safari-pinned-tab.svg" color="#a676b4">
<link rel="shortcut icon" href="{{ url('/') }}/images/favicon/favicon.ico">
<meta name="msapplication-TileColor" content="#9f00a7">
<meta name="msapplication-config" content="/images/favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="{{ url('/') }}/css/stylesMobile.css">
<title>Pixelmorph</title>
</head>

<body>
<script type="text/javascript" src="{{ url('/') }}/js/build.js"></script>
<?php
include (public_path() . '/images/icons.svg');
?>

<div class="overlay">
  <div class="progress">
      <div class="indeterminate"></div>
  </div>
</div>

<div class="wrapInner">
    <div class="content">
        <noscript>
        <div class="noScriptAlert">
            <svg class="icon40 icon-red floatLeft marginDefault"><use xlink:href="#icon-alert"></use></svg>
            <b>Sry, die Seite wird nur mit Javascript nutzbar sein.</b>
                <br>
                Es gibt viele gute Gründe ohne Javascript zu surfen. Ein gesundes Bedürfnis nach Sicherheit und Schutz der eigenen Privatspähre dürften wohl die wichtigsten sein und deaktiviertes Javascript ist defakto die beste Lösung.
                Doch dies ist lediglich der Spielplatz eines Frontend-Webentwicklers ohne für Dich relevante Inhalte die keiner Barrierefreiheit bedürfen. Eine javascriptfreie Version ist nicht vorgesehen. Auch wenn ich eher zum befriedigen meines Spieltriebs einiges was normal mit Javascript gelöst wird mit CSS gemacht habe, wird nicht alles nutzbar sein so lange Javascript deaktiviert bleibt.
        </div>
        </noscript>
        @yield('content')
    </div>
</div>
@yield('navmobile')

<script>
function mResize() {
    var width = $(window).width();
    if (width >= 500) {
        $('.overlay').css({'display': 'block', 'height': '100%'});
        $('.wrapInner').html('');
        $('.mobileNavWrap').html('');
        var url = $(location).attr('href').split('/');
        url[3] = 'desk';
        var newurl = url[0] + '//' + url[2];
        for(var i = 3; i < url.length; i++) {
            newurl = newurl + '/' + url[i];
        }
        window.location = newurl;
    }
}
</script>
</body>
</html>

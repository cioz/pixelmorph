<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<meta name="description" content="Pixelmorph"/>
<meta name="keywords" content="Pixelmorph"/>
<link rel="icon" type="image/png" sizes="32x32" href="{{ url('/') }}/images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/images/favicon/favicon-16x16.png">
<link rel="stylesheet" href="{{ url('/') }}/css/stylesDesk.css">
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
<div class="wrap">
    <div class="wrapInner">
        <div class="left"></div>
        <div class="main">
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
        <div class="right"></div>
    </div>
    @yield('nav')
</div>

<script>

</script>
</body>
</html>

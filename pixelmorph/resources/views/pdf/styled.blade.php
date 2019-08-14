<style>
@font-face {
    font-family: 'source';
    src: url({{ url('/') }}/fonts/source/SourceSansPro-Regular.ttf') format("truetype");
    font-weight: 400;
    font-style: normal;
}
@font-face {
    font-family: 'source-bold';
    src: url({{ url('/') }}/fonts/source/SourceSansPro-SemiBold.ttf') format("truetype");
    font-weight: 400;
    font-style: normal;
}
@font-face {
    font-family: 'Regular';
    src: url({{ url('/') }}/fonts/raleway/Raleway-Regular.ttf') format("truetype");
    font-weight: 400;
    font-style: normal;
}
@font-face {
    font-family: 'RegularBold';
    src: url({{ url('/') }}/fonts/raleway/Raleway-Medium.ttf') format("truetype");
    font-weight: 400;
    font-style: normal;
}
@page {
    margin: 0px;
}
body {
    font-family: 'Regular';
    font-size: 12px;
    margin: 0px;
    padding: 0px;
    background-image: url({{ url('/') }}/images/pdf_bg.gif');
}
body a {
    color: black;
    background-color: #ffffff;
    background-repeat: norepeat;
}
.bold {
        font-size: 13px;
    font-family: 'source-bold';
}
.wrap {
    position: absolute;
    top: 0;
    left: 0;
    height: 3508px;
    width: 2480px;
}
.page-break {
    page-break-after: always;
}
.leftBar {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    width: 200px;
    height: 3508px;
    margin-left: 5px;
    margin-right: 5px;
    border-left: 4px solid #ffffff;
    border-right: 4px solid #ffffff;
    background-color: #1a2b3f;
    font-family: 'Regular';
    text-align: center;
    color: #ffffff;
}
.leftBarOuter {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    width: 218px;
    height: 3508px;
    background-color: #1a2b3f;
}
.stripeHead {
    font-family: 'Regular';
    font-size: 18px;
    color: #ffffff;
    text-align: center;
}
.stripeSubHead {
    font-family: 'Regular';
    font-size: 12px;
    color: #6a7279;
    text-align: center;
}
.stripeText {
    font-family: 'Regular';
    font-size: 12px;
    color: #ffffff;
    text-align: center;
}
.rightBar {
    position: absolute;
    top: 101;
    left: 180;
    z-index: 1;
    width: 556px;
    height: 3900px;
    font-family: 'source';
}
.rightBarDesc {
    position: fixed;
    top: 0;
    left: 5;
    z-index: 2;
    width: 800px;
    height: 3900px;
    font-family: 'source';
}
.langDesc {
    font-family: 'Regular';
    font-size: 12px;
    color: #6a7279;
    text-align: center;
}
.headline {
    position: absolute;
    top: 10;
    left: 210;
    z-index: 1;
    width: 510px;
    height: 500px;
    text-align: right;
}
.hname {
    font-family: 'Regular';
    font-size: 30px;
}
.htitel {
    font-family: 'Regular';
    font-size: 20px;
    color: #999999;
}
.hmini {
    font-family: 'Regular';
    font-size: 12px;
    color: #999999;
}
.portrait {
    position: absolute;
    top: 2;
    left: 90;
    z-index: 1;
    width: 200px;
    height: 200px;
    font-family: 'source';
}
.portrait img{
    width: 120px;
    height: auto;
    border-radius: 50%;
}
.vita {
    padding-top: 6px;
    line-height: 1;
}
.vitaHead {
    width: 100%;
    height: 2px;
    background-color: #1a2b3f;
}
.vitaDate {
    float: right;
    width: 70px;
    height: 18px;
    padding: 2px;
    margin: 0;
    background-color: #1a2b3f;
    color: #ffffff;
    font-family: 'source-bold';
    text-align: center;
    border: 1px solid #1a2b3f;
}
.skillItemWrap {
    position: relative;
    display: flex;
    flex-direction: column;
    padding-left: 40px;

}
.skillItemIcon {
    height: 55px;
    width: auto;
}
.percWrap {
    width: 120px;
    height: 8px;
    border: 1px solid white;
    margin-left: auto;
    margin-right: auto;
    opacity: .8;
    text-align: center;
}
.percWrap:after {
    content: '';
}
.percValue {
    height: 4px;
    margin: 2px;
    background-color: #999999;
    opacity: .3;
    text-align: center;
}
.percText {
    height: 10px;
    font-size: 10px;
}
.skillWrap {
    margin: 0;
    padding: 0;
    width: 100%;
}
.skillBox {
    height: 100px;
    margin-right: 10px;
    float: left;
    width: 220px;
    color: #fff;
    font-size: 18px;
    font-family: 'Regular';
    text-align: center;
    background-color: #1a2b3f;
}
.desc {
    min-width: 680px;
    line-height: 1;
    font-family: "source";
    padding: 10px;
}
.skillHead {
    font-size: 26px;
    font-family: "source-bold";
    background-color: #1a2b3f;
    color: #ffffff;
    padding-left: 240px;
    height: 50px;
}
.dividerWrap {
    width: 100%;
    height: 2px;
}
.wdivider {
    width: 221px;
    height: 2px;
    background-color: #ffff;
}
.divider {
    width: 815px;
    height: 2px;
    background-color: #1a2b3f;
}
.descSpace {
    padding-left: 4px;
    padding-right: 6px;
}
</style>

<div class="wrap"></div>
<div class="leftBarOuter"></div>
<div class="leftBar">
    <p><span class="stripeHead">Persönliches</span></p>
    <span class="stripeSubHead">Geboren am</span>
    <br>
    <span class="stripeText">{!! $person[0]->geb !!}</span>
    <br>
    <span class="stripeSubHead">Familienstand</span>
    <br>
    <span class="stripeText">{!! $person[0]->family !!}</span>
    <br>
    <span class="stripeSubHead">Staatsangehörigkeit</span>
    <br>
    <span class="stripeText">{!! $person[0]->state !!}</span>
    <br>
    <span class="stripeSubHead">Religiöse Ausrichtung</span>
    <br>
    <span class="stripeText">{!! $person[0]->rel !!}</span>
    <br><br>
    <hr>
    <p><span class="stripeHead">Sprachen</span></p>
    {!! $person[0]->lang !!}
    <br><br>
    <hr>
        <p><span class="stripeHead">Kontakt</span></p>
    {!! $person[0]->adress !!}<br>
    <p>{!! $person[0]->tele !!}</p>
    <br><br>
    <p>{!! $person[0]->email !!}</p>
</div>

<div class="headline"><span class="hname">Dirk Hedtke</span><br><span class="htitel">Frontend Webentwickler</span><br><span class="hmini">{{ $date }}</span></div>
<div class="portrait"><img class="portrait" src="{{ url('/') }}/images/portrait.png"></div>
<div class="rightBar">
    @foreach ($vita as $val)
    <div class="vita">
        <div class="vitaHead"></div>
        <div class="vitaDate">{{ $val['start'] }} - {{ $val['end'] }}</div>
        <div class="vitaBody">
            <span class="bold">{{ $val['title'] }}</span>
            <br>
            <p>
            {!! $val['desc'] !!}
            </p>
        </div>
    </div>
    @endforeach
</div>

<div class="page-break"></div>

@foreach ($skillcats as $cat)
@isset ($cat['items'])
@if ($cat['title'] == 'Frontend Javascript Frameworks')
    <div class="page-break"></div>
@endif
@if ($cat['title'] == 'Frontend CMS')
    <div class="page-break"></div>
@endif
    <div class="skillWrap">
        <div class="skillBoxHead">
        </div>
        <div class="skillHead">{{ $cat['title'] }}</div>
    </div>
    <div style="clear: both"></div>
    @foreach ($cat['items'] as $item)
        @php
            if ($item['title'] == 'Quasar' || $item['title'] == 'Docker' || $item['title'] == 'Yii2' || $item['title'] == 'Malen & Zeichnen') {
                $divider = '';
            } else {
                $divider = '<div class="dividerWrap"><div class="wdivider"><div class="divider"></div></div>';
            }
        @endphp
        <div class="skillWrap">
            <div class="skillBox">
                {!! $item['title'] !!}
                <div class="percWrap">
                    <div class="percValue" style="width: {!! $item['perc'] !!}%;"></div>
                </div>
                <div class="stripeSubHead percText">{!! $item['perc'] !!}%</div>
            </div>
            <div class="desc">
                <div class="descSpace">{!! $item['description'] !!}</div>
            </div>
        </div>
        <div style="clear: both"></div>
        {!! $divider !!}
    @endforeach
@endisset
@endforeach

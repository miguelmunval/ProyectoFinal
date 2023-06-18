<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <script src="{{asset('js/anime-master/lib/anime.min.js')}}"></script>
  <script defer src="{{asset('js/galeria.js')}}"></script>
  <script src="{{asset('js/animacion.js')}}"></script>
  <title>AgroAssist</title>
</head>
<body>
  <div id="container">
    <div id="header">
      <div id="mask">
        <video autoplay="autoplay" loop="loop" id="video_background" preload="auto" muted="true">
          <source src="{{ asset('Barley_3_Videvo.mp4') }}" type="video/mp4" />
        </video>
      </div>
      <svg
        width="120mm"
        height="294mm"
        viewbox="0 0 190 277"
        version="1.1"
        id="svg5"
        inkscape:version="1.2.2 (732a01da63, 2022-12-09)"
        sodipodi:docname="AgroAssist.svg"
        xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
        xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:svg="http://www.w3.org/2000/svg">
        <g
          inkscape:label="Capa 1"
          inkscape:groupmode="layer"
          id="layer1">
          <path
            style="stroke:#1a1a1a;stroke-width:0.264999;fill:#808080;fill-opacity:0;stroke-opacity:1"
            d="m 28.094593,150.68919 36.486488,-62.756759 26.635133,62.027029 -23.716215,0.36486 21.891892,-37.58108 22.256759,37.21622"
            id="path343"
            inkscape:highlight-color="#525252" />
          <path
            style="fill:#808080;fill-opacity:0;stroke:#1a1a1a;stroke-width:0.267174;stroke-opacity:1"
            d="M 33.568519,150.77988 64.46301,96.326791 79.17467,130.54393"
            id="path3113" />
          <path
            style="fill:#808080;fill-opacity:0;stroke:#1a1a1a;stroke-width:0.276209;stroke-opacity:1"
            d="m 87.115804,116.66809 19.055546,33.28882"
            id="path3115" />
          <path
            style="fill:#35c029;fill-opacity:1;stroke:#1a1a1a;stroke-width:0.248429"
            d="M 28.237075,150.91496 111.60898,149.8935 92.151229,212.65641 Z"
            id="path898" />
        </g>
      </svg>
      <div class="header-buttons">
        <h1 id="title">AgroAssist</h1>
        <button onclick="window.location.href='{{ route('login') }}'">@lang('app.ini')</button>
      </div>
    </div>
    <div id="slider">
      <canvas id="lienzo"></canvas>
      <audio id="audio">
        <source src="{{ asset('canary-singing.mp3') }}" type="audio/mpeg">
      </audio>
    </div>
  </div>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TOPLESSON Образовательная программа</title>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Neucha&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #538d8f;
            color: #fafafa;
            font-family: 'Poiret One', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-family: 'Poiret One', cursive;
            font-size: 84px;
        }

        .links > a, .content > a {
            color: #fcfcfc;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        p {
            font-size: 1.125rem;
        }
        .content {
            max-width: 960px;
        }
        video::-webkit-media-controls-fullscreen-button
        {
            display: none !important;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">{{ __('messages.home') }}</a>
            @else
                <a href="{{ route('login') }}">{{ __('messages.login') }}</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('messages.register') }}</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md tran-all">
            TOPLESSON
        </div>
        <h2 style="color:#ace7ee;">{{ __('messages.learning_platform') }}</h2>
        <br>
        <p>
            Курс направлен на изучение музыкальных направлений в различные периоды развития цивилизации Европейского
            континента. Начиная с эпохи Средневековья заканчивая эпохой Экспрессионизма.
        </p>
        <p>
            Информация об инструментальной и вокальной музыке изложена компактно.
        </p>
        <p>
            Визуальное восприятие сопровождается музыкальными фрагментами и кратким изложением жизни и творчества
            композиторов творивших в ту или иную эпоху.
        </p>

        <video style="max-width: 480px;" src="/videos/shorts/barrocco/barrocco-short-480p.mp4" controls></video>
        <br>
        <a href="{{ route('register') }}">{{ __('messages.register') }}</a>
    </div>
</div>
</body>
</html>

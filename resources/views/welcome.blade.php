<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 84px;
            }
        </style>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div>
                <div class="title">
                    Favourite TV Show
                </div>
                <div>
                    <ul class="list-unstyled">
                        @foreach($tvShows as $tvShow)
                        <li class="media">
                            <img class="mr-3" src="https://picsum.photos/id/{{rand(100, 200)}}/100/100" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">{{$tvShow->user->name}}</h5>
                                {{$tvShow->quote}}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>

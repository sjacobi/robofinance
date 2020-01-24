<?php

use App\Helpers\MoneyHelper;

?><!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Тестовое задание</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>

<div class="b-test">

    <div class="b-sidebar">

        <div class="b-sidebar__user-panel">

            <div class="user-panel">

                <div class="user-panel__avatar"></div>
                <div class="user-panel__name">
                    <div>{{ auth()->user() ? auth()->user()->name : 'Гость' }}</div>
                    <div>{{ auth()->user() ? 'Баланс: ' . MoneyHelper::decode(auth()->user()->balance) : '' }}</div>
                </div>

            </div>

        </div>

        <a href="{{route('user-list')}}" class="b-sidebar-button">Выбор пользователя</a>
        <a href="{{route('home')}}" class="b-sidebar-button">Список всех переводов</a>
        <a href="{{route('transaction-create')}}" class="b-sidebar-button">Создать перевод</a>

    </div>

    <div class="b-content">

        <div class="row">
            <div class="col-12">
                <div class="flash-messages">

                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <div class="flash-messages__{{$msg}}">
                                <p>{{ Session::get('alert-' . $msg) }}</p>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>

        @if($errors->any())

            <div class="row">
                <div class="col-12">
                    <div class="flash-messages">

                        <div class="flash-messages__danger">

                            @foreach($errors->all() as $error)

                                <p>{{ $error }}</p>

                            @endforeach

                        </div>

                    </div>
                </div>
            </div>

        @endif


        @yield('content')


    </div>


</div>

<div class="scripts">

    <script src="{{ mix('js/app.js') }}"></script>

</div>
</body>
</html>

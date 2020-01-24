@extends('layouts.main')

@section('title', 'Выбор пользователя')

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="b-list">

                @foreach ($users as $user)

                    <a href="{{route('user-select', ['userId' => $user->id])}}" class="b-list__block">

                        <div class="b-list__cell col-2">

                            <div class="b-list__title">
                                ID{{$user->id}}
                            </div>

                        </div>

                        <div class="b-list__cell col-8">

                            <div class="b-list__title">
                                {{$user->name}}
                            </div>

                        </div>

                        <div class="b-list__cell col-2">

                            <div class="icon__hand-touch">
                            </div>

                        </div>

                    </a>

                @endforeach

            </div>


        </div>
    </div>

@stop
